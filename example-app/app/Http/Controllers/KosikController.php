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
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->cena * $item->mnozstvo;
        });

        return view('kosik', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice]);
    }

    public function pridat_do_kosika($produktId): RedirectResponse
    {
        $produkt = Produkt::findOrFail($produktId);

        if (Produkt::where('id', $produktId)->first()->na_sklade <= 0) {
            return redirect()->route('app_produkt', ['id' => $produktId])->withErrors([
                'produkt' => 'Produkt nie je dostupný na sklade.',
            ]);
        }

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
                'cena' => $produkt->je_v_zlave ? $produkt->cena_zlava : $produkt->cena,
            ]);
        }

        return redirect()->route('app_kosik')->with('success', 'Produkt bol pridaný do košíka.');
    }

    public function vymazat_z_kosika($cartItemId): RedirectResponse
    {
        $cartItem = Produkt_v_kosiku::findOrFail($cartItemId);
        $cartItem->delete();

        return redirect()->route('app_kosik')->with('success', 'Produkt bol vymazaný z košíka.');
    }
}
