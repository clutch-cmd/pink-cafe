<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use App\Models\Produs;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCompleted;
use App\Mail\OrderConfirmed;
use App\Notifications\ComandaStatus;

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
        $comenzi = Comanda::with('produse')->orderBy('created_at', 'desc')->get();
        return view('admin.comenzi', compact('comenzi'));
    }

    public function schimbaStatus(Request $request, $id)
    {
        $comanda = Comanda::findOrFail($id);
        $comanda->status = $request->status;
        $comanda->save();

        // Când statusul e "livrata" - trimitem și email cu produsele
        if ($request->status === 'livrata' && $comanda->user) {
            $comanda->load('produse');
            Mail::to($comanda->user->email)->send(new OrderCompleted($comanda));
        }

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
            'imagine' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Pregătesc datele
        $data = $request->all();

        // Procesez imaginea dacă a fost încărcată
        if ($request->hasFile('imagine')) {
            $file = $request->file('imagine');
            
            // Genrez un nume unic pentru imagine
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Salvez imaginea în public/images/
            $file->move(public_path('images'), $filename);
            
            // Salvez doar numele fișierului în baza de date
            $data['imagine'] = $filename;
        }

        Produs::create($data);
        return back()->with('success', 'Produs adăugat cu succes' . ($request->hasFile('imagine') ? ' și imaginea salvată!' : '!'));
    }

    public function stergeProdus($id)
    {
        $produs = Produs::findOrFail($id);
        
        // Șterg imaginea dacă există
        if ($produs->imagine && file_exists(public_path('images/' . $produs->imagine))) {
            unlink(public_path('images/' . $produs->imagine));
        }
        
        $produs->delete();
        return back()->with('success', 'Produs șters!');
    }

    public function editeazaProdus(Request $request, $id)
    {
        $produs = Produs::findOrFail($id);
        
        $request->validate([
            'imagine' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->all();

        // Procesez imaginea nouă dacă a fost încărcată
        if ($request->hasFile('imagine')) {
            // Șterg imaginea veche
            if ($produs->imagine && file_exists(public_path('images/' . $produs->imagine))) {
                unlink(public_path('images/' . $produs->imagine));
            }

            $file = $request->file('imagine');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['imagine'] = $filename;
        }

        $produs->update($data);
        return back()->with('success', 'Produs actualizat!');
    }
    public function finalizeazaComanda($id)
{
    $comanda = Comanda::findOrFail($id);
    $comanda->status = 'finalizata';
    $comanda->save();

    // Trimitem mailul de notificare
    Mail::to($comanda->user->email)->send(new OrderCompleted($comanda));

    return back()->with('succes', 'Clientul a fost notificat!');
}
}