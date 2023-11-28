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
        ]);

        return redirect()->route('app_index');
    }
}
