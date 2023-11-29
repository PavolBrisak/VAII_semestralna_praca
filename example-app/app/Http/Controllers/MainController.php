<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('ucet', [
        ]);
    }
}
