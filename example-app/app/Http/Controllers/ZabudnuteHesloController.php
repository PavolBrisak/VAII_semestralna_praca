<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ZabudnuteHesloController extends Controller
{
    public function get(): View
    {
        return view('zabudnute-heslo', [
        ]);
    }

    public function post(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.email' => 'Prosím, zadajte platnú e-mailovú adresu',
        ]);

        return redirect()->route('app_prihlasenie');
    }
}
