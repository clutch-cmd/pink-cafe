<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComandaProdus extends Model
{
    protected $table = 'comanda_produse';

    protected $fillable = [
        'comanda_id', 'produs_id', 'cantitate', 'pret'
    ];
}