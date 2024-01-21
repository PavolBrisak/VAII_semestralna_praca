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
    public function vlozit_produkt_index(Request $request): View
    {
        $request->validate([
            'name' => 'required|unique:produkts,nazov',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ], [
            'name.unique' => 'Produkt s týmto názvom už existuje',
            'name.required' => 'Nevyplnili ste názov',
            'description.required' => 'Nevyplnili ste popis',
            'price.required' => 'Nevyplnili ste cenu',
            'price.numeric' => 'Cena musí byť číslo',
            'category.required' => 'Nevybrali ste kategóriu',
            'picture.required' => 'Nevybrali ste obrázok',
            'picture.image' => 'Súbor musí byť obrázok',
            'picture.mimes' => 'Súbor musí byť obrázok',
            'picture.max' => 'Súbor musí byť menší ako 4MB',
        ]);

        $picturePath = null;

        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('obrazok_folder', 'public');
        }

        $product = Produkt::create([
            'nazov' => $request->input('name'),
            'popis' => $request->input('description'),
            'cena' => $request->input('price'),
            'kategoria' => $request->input('category'),
            'obrazok' => $picturePath,
        ]);

        $categories = ['Kvetinky', 'Jedlo', 'Pucky', 'Tvary', 'Vianočné', 'Srdiečka', 'Smajlíky', 'Pride', 'Kamienky', 'Memes', 'Ostatné'];
        return view('vlozit-produkt', ['success' => 'Produkt bol vložený'], compact('categories'));
    }

    public function vlozit_produkt(): View
    {
        $categories = ['Kvetinky', 'Jedlo', 'Pucky', 'Tvary', 'Vianočné', 'Srdiečka', 'Smajlíky', 'Pride', 'Kamienky', 'Memes', 'Ostatné'];
        return view('vlozit-produkt', compact('categories'));
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
            'nazov' => 'required|unique:produkts,nazov,',
            'popis' => 'required',
            'cena' => 'required|numeric',
            'category' => 'required',
        ], [
            'nazov.unique' => 'Produkt s týmto názvom už existuje',
            'nazov.required' => 'Nevyplnili ste názov',
            'popis.required' => 'Nevyplnili ste popis',
            'cena.required' => 'Nevyplnili ste cenu',
            'cena.numeric' => 'Cena musí byť číslo',
            'category.required' => 'Nevybrali ste kategóriu',
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
        $produkty = Produkt::where('je_v_zlave', true)->take(20)->get();

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
