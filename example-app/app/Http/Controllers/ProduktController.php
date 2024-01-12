<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProduktController extends Controller
{

    public function vlozit_produkt_index(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('obrazok_folder', 'public');
        } else {
            $picturePath = null;
        }

        $product = Produkt::create([
            'nazov' => $request->input('name'),
            'popis' => $request->input('description'),
            'cena' => $request->input('price'),
            'kategoria' => $request->input('category'),
            'obrazok' => $picturePath,
        ]);

        return redirect()->route('app_index');
    }

    public function vlozit_produkt(): View
    {
        return view('vlozit-produkt', [
        ]);
    }

    public function produkt(int $id): View
    {
        $produkt = Produkt::where('id', $id)->first();

        return view('produkt', [
            'produkt' => $produkt,
        ]);
    }

    public function kategoria(string $kategoria): View
    {
        /* select from produkts where kategoria = $kategoria */
        $produkty = Produkt::where('kategoria', $kategoria)->get();

        return view('kategorie', [
            'kategoria' => $kategoria,
            'produkty' => $produkty,
        ]);
    }

    public function vypredaj(): View
    {
        $produkty = Produkt::where('je_v_zlave', true)->get();

        return view('vypredaj', [
            'produkty' => $produkty,
        ]);
    }

    public function najpredavanejsie(): View
    {
        $produkty = Produkt::orderBy('pocet_predanych', 'desc')->take(20)->get();
        return view('najpredavanejsie', [
            'produkty' => $produkty,
        ]);
    }

    public function vyhladat(Request $request)
    {
        $search = $request->input('search');
        $produkty = Produkt::where('nazov', 'like', '%' . $search . '%')->get();
        return view('vyhladane', [
            'produkty' => $produkty,
            'search' => $search,
        ]);
    }
}
