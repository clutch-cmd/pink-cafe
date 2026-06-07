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

        return view('meniu', compact(
            'bauturiCalde', 
            'cocktailuri', 
            'lemonades', 
            'deserturi', 
            'inghetata'
        ));
    }


    public function show($id)
    {
        
        $produs = Produs::findOrFail($id);

        return view('produs', compact('produs'));
    }
}