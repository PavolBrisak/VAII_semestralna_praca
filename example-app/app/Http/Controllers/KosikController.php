<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use App\Models\Produkt_v_kosiku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class KosikController extends Controller
{
    public function kosik(): View
    {
        $cartItems = Auth::user()->kosik;

        return view('kosik', ['cartItems' => $cartItems]);
    }

    public function pridat_do_kosika($produktId): RedirectResponse
    {
        $produkt = Produkt::findOrFail($produktId);

        $existingProduct = Produkt_v_kosiku::where('user_id', Auth::id())
            ->where('nazov', $produkt->nazov)
            ->first();

        if ($existingProduct) {
            $existingProduct->increment('mnozstvo');
        } else {
            Produkt_v_kosiku::create([
                'user_id' => Auth::id(),
                'nazov' => $produkt->nazov,
                'mnozstvo' => 1,
                'cena' => $produkt->cena,
            ]);
        }

        return redirect()->route('app_kosik')->with('success', 'Product added to cart successfully!');
    }
}
