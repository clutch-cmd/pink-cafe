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
}