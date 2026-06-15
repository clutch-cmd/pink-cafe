<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produs;
use App\Models\Comanda;
use App\Models\ComandaProdus;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmed;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Notifications\ComandaStatus;
use App\Mail\OrderCompleted;
use App\Mail\OrderCancelled;
use App\Models\Favorite;

class ComandaController extends Controller
{
    public function index()
    {
        $bauturiCalde = Produs::where('categorie', 'bauturi_calde')->get();
        $cocktailuri = Produs::where('categorie', 'cocktailuri')->get();
        $lemonades = Produs::where('categorie', 'lemonades')->get();
        $deserturi = Produs::where('categorie', 'deserturi')->get();
        $inghetata = Produs::where('categorie', 'inghetata')->get();

        return view('comanda', compact(
            'bauturiCalde',
            'cocktailuri',
            'lemonades',
            'deserturi',
            'inghetata'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nume' => 'required|min:3',
            'telefon' => 'required|min:9',
            'adresa' => 'required|min:5',
            'produse' => 'required|array|min:1',
        ], [
            'nume.required' => 'Numele este obligatoriu',
            'telefon.required' => 'Telefonul este obligatoriu',
            'adresa.required' => 'Adresa este obligatorie',
            'produse.required' => 'Selectează cel puțin un produs',
        ]);

        $total = 0;
        $produseSelectate = [];

        foreach ($request->produse as $produsId => $cantitate) {
            if ($cantitate > 0) {
                $produs = Produs::find($produsId);
                if ($produs) {
                    $total += $produs->pret * $cantitate;
                    $produseSelectate[] = [
                        'produs' => $produs,
                        'cantitate' => $cantitate,
                    ];
                }
            }
        }

        if (empty($produseSelectate)) {
            return back()->withErrors(['produse' => 'Selectează cel puțin un produs!']);
        }

        // Creează comanda și salvează user_id-ul logat
        $comanda = Comanda::create([
            'user_id' => Auth::id(), // Salvează ID-ul utilizatorului logat
            'nume' => $request->nume,
            'telefon' => $request->telefon,
            'adresa' => $request->adresa,
            'comentarii' => $request->comentarii,
            'total' => $total,
            'status' => 'noua',
            'data_rezervare' => $request->data_rezervare,
            'ora_rezervare' => $request->ora_rezervare,
            'mentiuni' => $request->mentiuni,
        ]);

       

        // Salvează produsele comenzii
        foreach ($produseSelectate as $item) {
            ComandaProdus::create([
                'comanda_id' => $comanda->id,
                'produs_id' => $item['produs']->id,
                'cantitate' => $item['cantitate'],
                'pret' => $item['produs']->pret,
            ]);
        }

        try {
            Mail::to(Auth::user()->email)->send(new OrderConfirmed($comanda));
        } catch (\Exception $e) {
            logger()->error("Eroare trimitere email: " . $e->getMessage());
        }

        return redirect()->route('comanda.succes', $comanda->id);
    }

    public function succes($id)
    {
        $comanda = Comanda::with('produse')->findOrFail($id);
        return view('comanda-succes', compact('comanda'));
    }

    public function proceseazaComanda(Request $request)
    {
        $request->validate([
            'produs_id' => 'required|exists:produse,id',
            'data_rezervare' => 'required|date|after_or_equal:today',
            'ora_rezervare' => 'required',
        ], [
            'produs_id.required' => 'Selectează un produs',
            'data_rezervare.required' => 'Trebuie să alegi o dată pentru rezervare',
            'data_rezervare.after_or_equal' => 'Data rezervării nu poate fi în trecut',
            'ora_rezervare.required' => 'Trebuie să alegi o oră pentru rezervare',
        ]);

        $produs = Produs::findOrFail($request->produs_id);

        $toppings = $request->toppings ? json_encode($request->toppings) : null;

        // Calculăm prețul total cu topping-uri și opțiuni
        $pretTotal = $produs->pret;
        if ($request->optiune_lapte === 'migdale' || $request->optiune_lapte === 'ovaz') {
            $pretTotal += 15;
        }
        if ($request->toppings) {
            foreach ($request->toppings as $topping) {
                if ($topping === 'frisca') $pretTotal += 10;
                if ($topping === 'sirop_vanilie') $pretTotal += 8;
            }
        }

        $user = Auth::user();

        $comanda = Comanda::create([
            'user_id' => $user->id,
            'nume' => $user->name,
            'telefon' => $request->telefon ?? '—',
            'adresa' => 'Rezervare la restaurant',
            'comentarii' => $request->mentiuni_speciale,
            'total' => $pretTotal,
            'status' => 'noua',
            'produs_id' => $produs->id,
            'optiune_lapte' => $request->optiune_lapte,
            'toppings' => $toppings,
            'data_rezervare' => $request->data_rezervare,
            'ora_rezervare' => $request->ora_rezervare,
            'numar_persoane' => $request->numar_persoane,
            'mentiuni' => $request->mentiuni_speciale,
        ]);

        // Salvează în comanda_produse
        ComandaProdus::create([
            'comanda_id' => $comanda->id,
            'produs_id' => $produs->id,
            'cantitate' => 1,
            'pret' => $pretTotal,
        ]);

        Mail::to(Auth::user()->email)->send(new OrderConfirmed($comanda));

        return redirect()->route('comanda.succes', $comanda->id);
    }

    public function contComenzi()
    {
        $comenzi = Comanda::with('produse')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('cont-comenzi', compact('comenzi'));
    }

    public function anuleazaComanda($id)
    {
        $comanda = Comanda::with('produse')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($comanda->status === 'livrata' || $comanda->status === 'anulata') {
            return back()->with('error', 'Această comandă nu mai poate fi anulată.');
        }

        $comanda->update(['status' => 'anulata']);

        Mail::to(Auth::user()->email)->send(new OrderCancelled($comanda));

        return redirect()->route('cont.comenzi')->with('success', 'Comanda a fost anulată cu succes.');
    }

    public function marcheazaLivrat($id)
{
    $comanda = Comanda::with('produse', 'user')->findOrFail($id);

    $comanda->update([
        'status' => 'livrat'
    ]);

    if ($comanda->user) {

        Mail::to($comanda->user->email)
            ->send(new OrderCompleted($comanda));

    }

    return back()->with(
        'succes',
        'Comanda a fost marcată ca livrată.'
    );
}

    public function actualizeazaCont(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'current_password' => 'nullable|required_with:password|string',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required' => 'Numele este obligatoriu',
            'email.required' => 'Adresa de email este obligatorie',
            'email.unique' => 'Această adresă de email este deja folosită',
            'current_password.required_with' => 'Introdu parola actuală pentru a o schimba',
            'password.min' => 'Parola nouă trebuie să aibă minim 8 caractere',
            'password.confirmed' => 'Confirmarea parolei nu corespunde',
        ]);

        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Parola actuală este incorectă'])->withInput();
            }
            $user->password = $request->password;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('cont.comenzi')->with('success', 'Datele contului au fost actualizate cu succes.');
    }
}