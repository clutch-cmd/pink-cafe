<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produs;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle($id)
    {
        $user = Auth::user();
        $produs = Produs::findOrFail($id);

        $favorit = $user->favorite()->where('produs_id', $id)->first();

        if ($favorit) {
            $user->favorite()->detach($id);
            return back()->with('success_fav', 'Produs eliminat din favorite.');
        } else {
            $user->favorite()->attach($id);
            return back()->with('success_fav', 'Produs adăugat la favorite!');
        }
    }

    public function sterge($id)
    {
        Auth::user()->favorite()->detach($id);
        return back()->with('success_fav', 'Produs șters din favorite.');
    }
}