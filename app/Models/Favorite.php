<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorite';

    protected $fillable = ['user_id', 'produs_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produs()
    {
        return $this->belongsTo(Produs::class);
    }
}