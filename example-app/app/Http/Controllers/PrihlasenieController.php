<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PrihlasenieController extends Controller
{
    public function get(): View
    {
        return view('prihlasenie', [
        ]);
    }

    public function post(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Prosím, zadajte e-mailovú adresu',
            'email.email' => 'Prosím, zadajte platnú e-mailovú adresu',
            'password.required' => 'Prosím, zadajte heslo',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('app_ucet');
        }

        return redirect()->route('app_prihlasenie')
            ->withInput($request->except('password'))
            ->withErrors(['nespravne_heslo' => 'Nesprávny e-mail alebo heslo.']);
    }
}
