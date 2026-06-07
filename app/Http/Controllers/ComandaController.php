<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produs;
use App\Models\Comanda;
use App\Models\ComandaProdus;

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
            'produse.min' => 'Selectează cel puțin un produs',
        ]);

        // Calculează totalul
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

        // Creează comanda
        $comanda = Comanda::create([
            'nume' => $request->nume,
            'telefon' => $request->telefon,
            'adresa' => $request->adresa,
            'comentarii' => $request->comentarii,
            'total' => $total,
            'status' => 'noua',
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

        return redirect()->route('comanda.succes', $comanda->id);
    }

    public function succes($id)
    {
        $comanda = Comanda::with('produse')->findOrFail($id);
        return view('comanda-succes', compact('comanda'));
    }
    public function proceseazaComanda(Request $request)
    {
        // 1. Validarea datelor (Ne asigurăm că data și ora sunt obligatorii și logice)
        $request->validate([
            'produs_id' => 'required|exists:produse,id',
            'data_rezervare' => 'required|date',
            'ora_rezervare' => 'required',
            'numar_persoane' => 'nullable|integer|min:1|max:20',
        ]);

        // 2. Găsim produsul pentru a calcula prețul total
        $produs = Produs::findOrFail($request->produs_id);
        
        // Calculăm prețul total cu opțiuni
        $pret_total = $produs->pret;
        
        // Adăugăm prețul laptelui dacă e diferit de normal
        if ($request->filled('optiune_lapte') && $request->optiune_lapte !== 'normal') {
            $preturi_lapte = [
                'migdale' => 15,
                'ovaz' => 15,
            ];
            $pret_total += $preturi_lapte[$request->optiune_lapte] ?? 0;
        }
        
        // Adăugăm prețurile toppingurilor
        if ($request->has('toppings') && is_array($request->toppings)) {
            $preturi_toppings = [
                'frisca' => 10,
                'sirop_vanilie' => 8,
                'ciocolata' => 12,
                'caramel' => 10,
            ];
            foreach ($request->toppings as $topping) {
                $pret_total += $preturi_toppings[$topping] ?? 0;
            }
        }

        // 3. Crearea unei înregistrări noi în tabelul 'comenzi'
        $comanda = Comanda::create([
            'produs_id' => $request->produs_id,
            'optiune_lapte' => $request->optiune_lapte,
            'toppings' => $request->has('toppings') ? json_encode($request->toppings) : null,
            'data_rezervare' => $request->data_rezervare,
            'ora_rezervare' => $request->ora_rezervare,
            'numar_persoane' => $request->numar_persoane,
            'mentiuni_speciale' => $request->mentiuni_speciale ?? $request->mentiuni,
            'pret_total' => $pret_total,
            'nume' => $request->nume ?? 'Rezervare',
            'telefon' => $request->telefon ?? '',
            'adresa' => $request->adresa ?? '',
            'comentarii' => $request->comentarii ?? null,
            'total' => $pret_total,
            'status' => 'noua',
        ]);

        // 4. Redirecționarea clientului
        return redirect()->back()->with('succes', 'Opțiunile și rezervarea au fost salvate! Continuăm spre finalizare.');
    }
}