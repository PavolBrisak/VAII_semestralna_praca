<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistraciaController extends Controller
{
    public function get(): View
    {
        return view('registracia', [
        ]);
    }

    public function post(Request $request): RedirectResponse
    {
        $request->validate([
            'meno' => 'required|string|regex:/^[A-Z][a-z]+$/',
            'priezvisko' => 'required|string|regex:/^[A-Z][a-z]+$/',
            'dic' => 'nullable|string',
            'email' => 'required|email',
            'heslo' => 'required|string|min:8',
            'heslo_potvrd' => 'required|same:heslo',
        ], [
            'heslo.min' => 'Heslo musí mať aspoň 8 znakov',
        ]);

        return redirect()->route('app_index');
    }
}
