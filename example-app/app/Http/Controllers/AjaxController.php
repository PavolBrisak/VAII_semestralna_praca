<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
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
}
