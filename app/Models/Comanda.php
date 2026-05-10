<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    protected $table = 'comenzi';

    protected $fillable = [
        'nume', 'telefon', 'adresa', 'comentarii', 'total', 'status'
    ];

    public function produse()
    {
        return $this->belongsToMany(Produs::class, 'comanda_produse')
                    ->withPivot('cantitate', 'pret')
                    ->withTimestamps();
    }
}