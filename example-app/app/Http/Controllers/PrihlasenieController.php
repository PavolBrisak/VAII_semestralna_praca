<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PrihlasenieController extends Controller
{
    public function get(Request $request): View
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
