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
    ];

    public function getNazov(): string
    {
        return $this->nazov;
    }

    public function getPopis(): string
    {
        return $this->popis;
    }

    public function getCena(): float
    {
        return $this->cena;
    }

    public function getKategoria(): string
    {
        return $this->kategoria;
    }

    public function getObrazok(): string
    {
        return $this->obrazok;
    }
}
