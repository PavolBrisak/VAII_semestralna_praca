<?php

namespace App\Http\Controllers;

use App\Models\Objednavka;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function odhlasenie(): View
    {
        Auth::logout();
        return view('prihlasenie', ['success' => 'Boli ste úspešne odhlásený.']);
    }

    public function zmena_mena_index(): View
    {
        return view('zmena-mena');
    }

    public function moje_objednavky(): View
    {
        $user = Auth::user();
        $objednavky = $user->objednavka()->paginate(10);
        return view('moje-objednavky', compact('objednavky'));
    }

    public function zobraz_objednavku($id): View
    {
        $objednavka = Objednavka::findOrFail($id);
        $produktyVObjednavke = $objednavka->produkt_v_objednavke;
        return view('zobraz-objednavku', compact('objednavka', 'produktyVObjednavke'));
    }

    public function zmena_mena(Request $request): View
    {
        $user = Auth::user();

        $request->validate([
            'meno' => 'required',
        ]);

        $user->update([
            'name' => $request->input('meno'),
        ]);

        return view('ucet', compact('user'));
    }

    public function zmena_hesla_index(): View
    {
        return view('zmena-hesla');
    }

    public function zmena_hesla(Request $request): View
    {
        $user = Auth::user();

        $request->validate([
            'heslo' => 'required|string|min:8',
            'heslo_potvrd' => 'required|string|same:heslo',
        ], [
            'heslo.required' => 'Prosím, zadajte heslo',
            'heslo.min' => 'Heslo musí mať aspoň 8 znakov',
            'heslo_potvrd.required' => 'Prosím, zadajte potvrdenie heslo',
            'heslo_potvrd.same' => 'Heslo a potvrdenie hesla sa nezhodujú',
        ]);

        $user->update([
            'password' => $request->input('heslo'),
        ]);

        return view('ucet', compact('user'));
    }


    public function zrusit_ucet_index(): View
    {
        return view('zrusit-ucet');
    }
    public function zrusit_ucet(): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('app_prihlasenie')->withErrors('Najprv sa musíte prihlásiť.');
        }

        $user = Auth::user();

        $produktyVKosiku = $user->kosik;
        $produktyVKosiku->each(function ($item) {
            $item->delete();
        });

        $objednavky = $user->objednavka;

        foreach ($objednavky as $objednavka) {
            $produktyVObjednavke = $objednavka->produkt_v_objednavke;
            $produktyVObjednavke->each(function ($item) {
                $item->delete();
            });

            $objednavka->delete();
        }

        $user->delete();

        return redirect()->route('app_prihlasenie')->withSuccess('Účet bol úspešne zrušený.');
    }

}
