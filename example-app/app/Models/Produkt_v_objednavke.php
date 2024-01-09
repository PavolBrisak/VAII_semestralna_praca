<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkt_v_objednavke extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nazov',
        'mnozstvo',
        'cena'
    ];

    public function objednavka()
    {
        return $this->belongsTo(Objednavka::class, 'objednavka_id');
    }
}
