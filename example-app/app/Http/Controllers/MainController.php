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

    public function kontakt(): View
    {
        return view('kontakt', [
        ]);
    }
}
