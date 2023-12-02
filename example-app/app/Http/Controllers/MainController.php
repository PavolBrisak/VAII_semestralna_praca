<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    //
    public function index(): View
    {
        $pozdrav = "ahoj";
        return view('welcome', [
            'kluc' => $pozdrav
        ]);
        //kluc je nalavo
    }

    public function doprava(): View
    {
        return view('doprava', [
        ]);
    }

    public function reklamacie(): View
    {
        return view('reklamacie', [
        ]);
    }

    public function ucet(): View
    {
        $user = Auth::user();
        return view('ucet', [
            'user' => $user
        ]);
    }
}
