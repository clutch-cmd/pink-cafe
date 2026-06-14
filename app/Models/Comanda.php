<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comanda extends Model
{
    use Notifiable;
    protected $table = 'comenzi';
    protected $guarded = [];

    protected $fillable = [
        'user_id',
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
        'mentiuni'
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
    // În app/Models/Comanda.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
