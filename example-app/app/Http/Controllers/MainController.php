<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $produktyNahodnyVyber = Produkt::inRandomOrder()->limit(rand(5, 15))->get();
        $produktyNove = Produkt::orderBy('created_at', 'desc')->take(10)->get();

        return view('welcome', [
            'produktyNahodnyVyber' => $produktyNahodnyVyber,
            'produktyNovinky' => $produktyNove,
        ]);
    }

    public function doprava(): View
    {
        return view('doprava');
    }

    public function reklamacie(): View
    {
        return view('reklamacie');
    }

    public function ucet(): View
    {
        $user = Auth::user();
        return view('ucet', [
            'user' => $user
        ]);
    }
}
