<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function meniu()
    {
        return view('meniu');
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