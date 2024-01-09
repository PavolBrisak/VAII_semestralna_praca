<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Objednavka extends Model
{
    use HasFactory;

    protected $table = 'objednavkas';

    protected $fillable = [
        'customer_id',
        'total_amount',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function produkt_v_objednavke(): HasMany
    {
        return $this->hasMany(Produkt_v_objednavke::class, 'objednavka_id');
    }
}
