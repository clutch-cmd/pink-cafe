<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produs;

class MeniuController extends Controller
{

    public function index()
    {

        $bauturiCalde = Produs::where('categorie', 'bauturi_calde')->get();
        $cocktailuri  = Produs::where('categorie', 'cocktailuri')->get();
        $lemonades    = Produs::where('categorie', 'lemonades')->get();
        $deserturi    = Produs::where('categorie', 'deserturi')->get();
        $inghetata    = Produs::where('categorie', 'inghetata')->get();
        $sandvisuri   = Produs::where('categorie', 'sandvisuri_burgere')->get();

        // numar total de produse pentru "Toate"
        $totalProduse = $bauturiCalde->count()
            + $cocktailuri->count()
            + $lemonades->count()
            + $deserturi->count()
            + $inghetata->count()
            + $sandvisuri->count();

        return view('meniu', compact(
            'bauturiCalde',
            'cocktailuri',
            'lemonades',
            'deserturi',
            'inghetata',
            'sandvisuri',
            'totalProduse'
        ));
    }


    public function show($id)
    {

        $produs = Produs::findOrFail($id);

        // Produse similare din aceeași categorie (exclus produsul curent)
        $produseSimilare = Produs::where('categorie', $produs->categorie)
            ->where('id', '!=', $produs->id)
            ->take(8)
            ->get();

        return view('produs', compact('produs', 'produseSimilare'));
    }
}