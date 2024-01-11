<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use App\Models\Produkt_v_kosiku;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AjaxController extends Controller
{
    public function refreshNaSklade(Request $request): JsonResponse {
        $producktId = $request->input('produkt_id');
        $produkt = Produkt::where('id', $producktId)->first();
        $naSklade = $produkt->na_sklade;
        return response()->json([
            'na_sklade' => $naSklade,
        ]);
    }

    public function updateQuantity(Request $request): JsonResponse {
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
}
