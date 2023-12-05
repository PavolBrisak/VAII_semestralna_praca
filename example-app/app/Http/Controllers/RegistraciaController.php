<?php

namespace App\Http\Controllers;

use App\Models\Objednavka;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'email' => 'required|email|unique:users,email',
            'heslo' => 'required|string|min:8',
            'heslo_potvrd' => 'required|same:heslo',
        ], [
            'meno.required' => 'Prosím, zadajte meno',
            'meno.regex' => 'Prosím, zadajte platné meno',
            'email.required' => 'Prosím, zadajte e-mailovú adresu',
            'email.email' => 'Prosím, zadajte platnú e-mailovú adresu',
            'email.unique' => 'Tento email už niekto používa',
            'heslo.required' => 'Prosím, zadajte heslo',
            'heslo.min' => 'Heslo musí mať aspoň 8 znakov',
            'heslo_potvrd.required' => 'Prosím, zadajte potvrdenie heslo',
            'heslo_potvrd.same' => 'Heslo a potvrdenie hesla sa nezhodujú',
        ]);

        $user = User::create([
            'name' => $request->input('meno') . ' ' . $request->input('priezvisko'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('heslo')),
        ]);

        auth()->login($user);

        return redirect()->route('app_ucet');
    }
}
