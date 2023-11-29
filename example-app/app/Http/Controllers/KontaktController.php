<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KontaktController extends Controller
{
    public function get(): View
    {
        return view('kontakt', [
        ]);
    }

    public function post(Request $request): RedirectResponse
    {
        $request->validate([
            'meno' => 'required|regex:/^[A-Z][a-z]*$/',
            'priezvisko' => 'required|regex:/^[A-Z][a-z]*$/',
            'email' => 'required|email',
            'sprava' => 'required',
        ], [
            'meno.required' => 'Prosím, zadajte meno',
            'meno.regex' => 'Prosím, zadajte platné meno',
            'email.required' => 'Prosím, zadajte e-mailovú adresu',
            'email.email' => 'Prosím, zadajte platnú e-mailovú adresu',
            'sprava.required' => 'Prosím, zadajte správu, ktorú chcete odoslať',
        ]);

        return redirect()->route('app_index');
    }
}
