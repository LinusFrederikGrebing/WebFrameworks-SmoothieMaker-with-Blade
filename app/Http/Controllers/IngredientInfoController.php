<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngredientInfo;

class IngredientInfoController extends Controller
{
    public function getIngredientInfo(Request $request, $id)
    {
        $ingredientInfo = IngredientInfo::where('ingrediente_id', $id)->first();
        return response()->json(['ingredientInfo' => $ingredientInfo]);
    }
}
