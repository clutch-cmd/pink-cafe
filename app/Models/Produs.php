<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produs extends Model
{
    protected $table = 'produse';
    
    protected $fillable = [
    'nume', 'pret', 'categorie', 'descriere', 'ingrediente', 'alergeni'
];
}