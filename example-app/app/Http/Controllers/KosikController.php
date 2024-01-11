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
        if (!Auth::check()) {
            return view('prihlasenie')->withErrors([
                'prihlasenie' => 'Prosím, prihláste sa pre zobrazenie košíka.',
            ]);
        }

        $cartItems = Auth::user()->kosik;
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->cena * $item->mnozstvo;
        });

        return view('kosik', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice]);
    }

    public function pridat_do_kosika($produktId): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('app_prihlasenie')->withErrors([
                'prihlasenie' => 'Prosím, prihláste sa pre pridanie produktu do košíka.',
            ]);
        }

        // check stock availability
        if (Produkt::where('id', $produktId)->first()->na_sklade <= 0) {
            return redirect()->route('app_produkt', ['id' => $produktId])->withErrors([
                'produkt' => 'Produkt nie je dostupný na sklade.',
            ]);
        }

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

        return redirect()->route('app_kosik')->with('success', 'Produkt bol pridaný do košíka.');
    }

    public function vymazat_z_kosika($cartItemId): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('app_prihlasenie')->withErrors([
                'prihlasenie' => 'Prosím, prihláste sa pre vymazanie produktu z košíka.',
            ]);
        }

        $cartItem = Produkt_v_kosiku::findOrFail($cartItemId);
        $cartItem->delete();

        return redirect()->route('app_kosik')->with('success', 'Produkt bol vymazaný z košíka.');
    }
}
