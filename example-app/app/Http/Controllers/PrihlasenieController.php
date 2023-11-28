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
        ]);

        return redirect()->route('app_index');
    }
}
