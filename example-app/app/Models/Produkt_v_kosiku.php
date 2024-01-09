<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkt_v_kosiku extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nazov',
        'mnozstvo',
        'cena'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

