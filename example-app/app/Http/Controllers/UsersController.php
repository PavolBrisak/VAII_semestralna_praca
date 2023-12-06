<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function odhlasenie(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('app_index');
    }

    public function zmena_mena_index(): View
    {
        return view('zmena-mena');
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
}
