<?php

namespace App\Http\Controllers;

use App\Models\Objednavka;
use App\Models\Produkt;
use App\Models\Produkt_v_kosiku;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AjaxController extends Controller
{
    public function refreshNaSklade(Request $request): JsonResponse
    {
        $producktId = $request->input('produkt_id');
        $produkt = Produkt::where('id', $producktId)->first();
        $naSklade = $produkt->na_sklade;
        return response()->json([
            'na_sklade' => $naSklade,
        ]);
    }

    public function sendOrder(Request $request): JsonResponse
    {
        $mnozstvo = $request->input('mnozstvo');
        $produktId = $request->input('id');
        $produkt = Produkt::where('id', $produktId)->first();
        $naSklade = $produkt->na_sklade;
        if ($mnozstvo > $naSklade) {
            return response()->json([
                'error' => 'Požadované množstvo nie je dostupné na sklade.',
            ], 422);
        } else {
            return response()->json([
                'success' => 'Objednávka bola úspešne vytvorená.',
            ]);
        }
    }

    public function updateQuantity(Request $request): JsonResponse
    {
        $produktCartId = $request->input('productId');
        $quantity = $request->input('newQuantity');
        $productName = $request->input('productName');

        $produktCart = Produkt_v_kosiku::find($produktCartId);
        if (!$produktCart) {
            return response()->json([
                'error' => 'Produkt v košíku nebol nájdený.',
            ], 404);
        }

        $product = Produkt::where('nazov', $productName)->first();
        if (!$product) {
            return response()->json([
                'error' => 'Produkt nebol nájdený.',
            ], 404);
        }

        $naSklade = $product->na_sklade;

        if ($quantity > $naSklade) {
            return response()->json([
                'error' => 'Požadované množstvo nie je dostupné na sklade.',
            ], 422);
        }

        $produktCart->update([
            'mnozstvo' => $quantity,
        ]);

        return response()->json([
            'success' => 'Množstvo bolo aktualizované.',
        ]);
    }

    public function filterProducts(Request $request): JsonResponse
    {
        $category = $request->input('category');
        $priceFrom = $request->input('priceFrom');
        $priceTo = $request->input('priceTo');
        $onSale = $request->input('onSale');
        if ($priceTo == 0) {
            $priceTo = 999999;
        }

        if ($category == 'Všetky') {
            $products = Produkt::where('je_v_zlave', $onSale == 'true' ? '1' : '0')
                ->where('cena', '>=', $priceFrom)
                ->where('cena', '<=', $priceTo)
                ->paginate(10);
        } else {
            $products = Produkt::where('kategoria', $category)
                ->where('cena', '>=', $priceFrom)
                ->where('cena', '<=', $priceTo)
                ->where('je_v_zlave', $onSale == 'true' ? '1' : '0')
                ->paginate(10);
        }

        $htmlContent = view('products_partial')->with('produkty', $products)->render();

        return response()->json([
            'htmlContent' => $htmlContent,
        ]);
    }

    public function filterOrdersDate(Request $request): JsonResponse
    {
        $status = $request->input('stav');
        $customer = $request->input('customer');

        $objednavky = collect();

        if (is_numeric($customer)) {
            $objednavky = Objednavka::where('customer_id', $customer)->get();
        } else if ($customer === null) {
            $objednavky = Objednavka::all();
        } else {
            $users = User::where(function ($query) use ($customer) {
                $query->where('name', 'like', '%' . $customer . '%')
                    ->orWhere('surname', 'like', '%' . $customer . '%');
            })->get();
            foreach ($users as $user) {
                $objednavky = $objednavky->merge($user->objednavka);
            }
        }

        if ($status !== 'Všetky') {
            $objednavky->where('status', $status);
        }

        $objednavky = $objednavky->orderBy('created_at', 'desc')->get();

        $htmlContent = view('upravit-objednavky-partial')->with('objednavky', $objednavky)->render();

        return response()->json([
            'htmlContent' => $htmlContent,
        ]);
    }

    public function filterOrdersStatus(Request $request): JsonResponse
    {
        $status = $request->input('stav');

        if ($status === 'Všetky') {
            $objednavky = Objednavka::all();
        } else {
            $objednavky = Objednavka::where('status', $status)->get();
        }

        $htmlContent = view('upravit-objednavky-partial')->with('objednavky', $objednavky)->render();

        return response()->json([
            'htmlContent' => $htmlContent,
        ]);
    }

    public function filterOrdersCustomer(Request $request): JsonResponse
    {
        $customer = $request->input('customer');
        $objednavky = collect();

        if (is_numeric($customer)) {
            $objednavky = Objednavka::where('customer_id', $customer)->get();
        } else if ($customer === null) {
            $objednavky = Objednavka::all();
        } else {
            $users = User::where(function ($query) use ($customer) {
                $query->where('name', 'like', '%' . $customer . '%')
                    ->orWhere('surname', 'like', '%' . $customer . '%');
            })->get();
            foreach ($users as $user) {
                $objednavky = $objednavky->merge($user->objednavka);
            }
        }

        $htmlContent = view('upravit-objednavky-partial')->with('objednavky', $objednavky)->render();

        return response()->json([
            'htmlContent' => $htmlContent,
        ]);
    }

    public function filterOrdersById(Request $request): JsonResponse
    {
        $orderId = $request->input('orderId');

        if ($orderId === null) {
            $objednavka = Objednavka::all();
        } else {
            $objednavka = Objednavka::where('id', $orderId)->get();
        }

        if (!$objednavka) {
            return response()->json([
                'error' => 'Objednávka nebola nájdená.',
            ], 404);
        }

        $htmlContent = view('upravit-objednavky-partial')->with('objednavky', $objednavka)->render();

        return response()->json([
            'objednavka' => $objednavka,
            'htmlContent' => $htmlContent,
        ]);
    }

    public function updateOrderStatus(Request $request): JsonResponse
    {
        $orderId = $request->input('orderId');
        $newStatus = $request->input('newStatus');

        $objednavka = Objednavka::find($orderId);
        if (!$objednavka) {
            return response()->json([
                'error' => 'Objednávka nebola nájdená.',
            ], 404);
        }

        $objednavka->update([
            'status' => $newStatus,
        ]);

        $htmlContent = view('upravit-objednavky-partial')->with('objednavka', $objednavka)->render();

        return response()->json([
            'success' => 'Stav objednávky bol aktualizovaný.',
            'htmlContent' => $htmlContent,
        ]);
    }
}
