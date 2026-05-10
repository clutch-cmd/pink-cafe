<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use App\Models\Produs;
use App\Models\User;

class AdminController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $totalComenzi = Comanda::count();
        $comenziNoi = Comanda::where('status', 'noua')->count();
        $totalVanzari = Comanda::where('status', '!=', 'anulata')->sum('total');
        $totalProduse = Produs::count();
        $ultimeleComenzi = Comanda::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalComenzi',
            'comenziNoi',
            'totalVanzari',
            'totalProduse',
            'ultimeleComenzi'
        ));
    }

    // Comenzi
    public function comenzi()
    {
        $comenzi = Comanda::orderBy('created_at', 'desc')->get();
        return view('admin.comenzi', compact('comenzi'));
    }

    public function schimbaStatus(Request $request, $id)
    {
        $comanda = Comanda::findOrFail($id);
        $comanda->status = $request->status;
        $comanda->save();
        return back()->with('success', 'Status actualizat!');
    }

    public function stergeComanda($id)
    {
        $comanda = Comanda::findOrFail($id);
        $comanda->delete();
        return back()->with('success', 'Comanda ștearsă!');
    }

    // Produse
    public function produse()
    {
        $produse = Produs::orderBy('categorie')->get();
        return view('admin.produse', compact('produse'));
    }

    public function adaugaProdus(Request $request)
    {
        $request->validate([
            'nume' => 'required',
            'pret' => 'required|numeric',
            'categorie' => 'required',
        ]);

        Produs::create($request->all());
        return back()->with('success', 'Produs adăugat!');
    }

    public function stergeProdus($id)
    {
        Produs::findOrFail($id)->delete();
        return back()->with('success', 'Produs șters!');
    }

    public function editeazaProdus(Request $request, $id)
    {
        $produs = Produs::findOrFail($id);
        $produs->update($request->all());
        return back()->with('success', 'Produs actualizat!');
    }
}