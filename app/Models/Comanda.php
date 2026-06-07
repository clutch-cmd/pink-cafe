<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    protected $table = 'comenzi';
    protected $guarded = [];

    protected $fillable = [
        'nume',
        'telefon',
        'adresa',
        'comentarii',
        'total',
        'status',
        'produs_id',
        'optiune_lapte',
        'toppings',
        'data_rezervare',
        'ora_rezervare',
        'numar_persoane',
        'mentiuni_speciale',
        'pret_total',
    ];

    protected $casts = [
        'toppings' => 'json',
        'data_rezervare' => 'date',
    ];

    public function produse()
    {
        return $this->belongsToMany(Produs::class, 'comanda_produse')
                    ->withPivot('cantitate', 'pret')
                    ->withTimestamps();
    }

    public function produs()
    {
        return $this->belongsTo(Produs::class);
    }
}