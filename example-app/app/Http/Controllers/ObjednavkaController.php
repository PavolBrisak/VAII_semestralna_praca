<?php

namespace App\Http\Controllers;

use App\Models\Objednavka;
use App\Models\Produkt;
use App\Models\Produkt_v_objednavke;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ObjednavkaController extends Controller
{
    public function vytvor_objednavku(): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('app_prihlasenie')->withErrors([
                'prihlasenie' => 'Prosím, prihláste sa pre vytvorenie objednávky.',
            ]);
        }

        $user = Auth::user();
        $kosik = $user->kosik;

        $kosik->each(function ($item) {
            $product = Produkt::where('nazov', $item->nazov)->first();
            $product->decrement('na_sklade', $item->mnozstvo);
        });

        $totalAmount = $kosik->sum(function ($item) {
            return $item->cena * $item->mnozstvo;
        });

        $objednavka = Objednavka::create([
            'customer_id' => $user->id,
            'total_amount' => $totalAmount,
            'status' => 'Vytvorena',
        ]);

        $kosik->each(function ($item) use ($objednavka) {
            Produkt_v_objednavke::create([
                'objednavka_id' => $objednavka->id,
                'nazov' => $item->nazov,
                'mnozstvo' => $item->mnozstvo,
                'cena' => $item->cena,
            ]);
        });

        $kosik->each(function ($item) {
            $item->delete();
        });

        return redirect()->route('app_objednavka_detail', ['id' => $objednavka->id]);
    }

    public function objednavka_detail($id): View
    {
        $objednavka = Objednavka::findOrFail($id);

        return view('vytvorena-objednavka', [
            'objednavka' => $objednavka,
        ]);
    }
}
