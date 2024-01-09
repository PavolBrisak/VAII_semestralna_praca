<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produkt_v_objednavke extends Model
{
    use HasFactory;

    protected $fillable = [
        'objednavka_id',
        'nazov',
        'mnozstvo',
        'cena'
    ];

    public function objednavka(): BelongsTo
    {
        return $this->belongsTo(Objednavka::class, 'objednavka_id');
    }
}
