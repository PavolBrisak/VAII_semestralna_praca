<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkt extends Model
{
    use HasFactory;

    protected $fillable = [
        'nazov',
        'popis',
        'cena',
        'kategoria',
        'obrazok',
        'na_sklade',
        'pocet_predanych',
        'je_v_zlave',
        'cena_zlava',
    ];
}
