<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produs; // ← linia asta trebuie să fie!

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function meniu()
    {
        $bauturiCalde = Produs::where('categorie', 'bauturi_calde')->get();
        $cocktailuri = Produs::where('categorie', 'cocktailuri')->get();
        $lemonades = Produs::where('categorie', 'lemonades')->get();
        $deserturi = Produs::where('categorie', 'deserturi')->get();

        return view('meniu', compact(
            'bauturiCalde',
            'cocktailuri',
            'lemonades',
            'deserturi'
        ));
    }

    public function contacte()
    {
        return view('contacte');
    }

    public function findUs()
    {
        return view('find-us');
    }

    public function comanda()
    {
        return view('comanda');
    }
}