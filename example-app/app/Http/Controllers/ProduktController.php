<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProduktController extends Controller
{

    public function vlozit_produkt_index(): View
    {
        return view('vlozit-produkt');
    }
    public function vlozit_produkt(Request $request): bool
    {
        return true;
    }
}
