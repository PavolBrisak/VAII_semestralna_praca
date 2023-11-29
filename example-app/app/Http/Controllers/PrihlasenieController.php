<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        ], [
            'email.required' => 'Prosím, zadajte e-mailovú adresu',
            'email.email' => 'Prosím, zadajte platnú e-mailovú adresu',
        ]);

        return redirect()->route('app_index');
    }
}
