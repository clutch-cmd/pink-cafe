<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Adaugă asta sus

class ContactController extends Controller
{
    public function salveazaMesaj(Request $request)
    {
        // Validăm datele
        $validated = $request->validate([
        'nume' => 'required|string|max:255',
        'telefon' => 'required|string|max:20',
        'email' => 'required|email', // Acum se va potrivi cu input-ul adăugat
        'mesaj' => 'nullable|string',
        'consimtamant' => 'required', // Atenție: checkbox-ul se trimite doar dacă e bifat
    ]);

        // Salvăm în baza de date
        DB::table('feedbacks')->insert([
            'nume' => $request->nume,
            'email' => $request->email,
            'mesaj' => $request->mesaj,
            'created_at' => now(),
        ]);

        return back()->with('status', 'Mesajul tău a fost trimis cu succes!');
    }
}