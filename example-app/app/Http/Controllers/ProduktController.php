<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function upravit_produkt_index(): View
    {
        return view('upravit-produkt', [
            'produkty' => DB::table('produkts')->paginate(6),
        ]);
    }

    public function upravit_produkt_id_index($id): View
    {
        $produkt = Produkt::findOrFail($id);
        return view('upravit-produkt-index', compact('produkt'))->with('success', '');
    }

    public function upravit_produkt(Request $request): JsonResponse
    {
        $request->validate([
            'nazov' => 'required',
            'popis' => 'required',
            'cena' => 'required',
            'category' => 'required',
        ]);

        $produkt = Produkt::findOrFail($request->input('id'));

        $produkt->update([
            'nazov' => $request->input('nazov'),
            'popis' => $request->input('popis'),
            'cena' => $request->input('cena'),
            'kategoria' => $request->input('category'),
            'na_sklade' => $request->input('amount'),
            'je_v_zlave' => $request->input('onSale') == 'true',
            'cena_zlava' => $request->input('onSale') == 'true' ? $request->input('salePrice') : null,
        ]);

        return response()->json();
//        return redirect()->route('app_upravit_produkt_id_index', ['id' => $produkt->id])->with('success', 'Produkt bol upravený');
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
