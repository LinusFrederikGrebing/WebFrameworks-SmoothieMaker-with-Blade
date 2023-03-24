<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngredientInfo;
use App\Models\Ingrediente;

class IngredientInfoController extends Controller
{
    public function getIngredientInfo(Request $request, $id)
    {
        $ingredientInfo = IngredientInfo::where('ingrediente_id', $id)->first();
        return response()->json(['ingredientInfo' => $ingredientInfo]);
    }
    public function getIngredient(Request $request, $id)
    {
        $ingrediente = Ingrediente::findOrFail($id);
        return response()->json(['ingrediente' => $ingrediente]);
    }
    public function showUpdateField(Request $request, $ingredienteID)
    {
        $ingrediente = Ingrediente::findOrFail($ingredienteID);
        $ingredientInfo = IngredientInfo::where('ingrediente_id', $ingredienteID)->first();
        return view('ingrediente/changeIngredientInfo', compact('ingrediente', 'ingredientInfo'));
    }
    public function showCreateIngredient($ingredienteID)
    {
        $ingrediente = Ingrediente::findOrFail($ingredienteID);
        return view('ingrediente/createIngredientInfo', compact('ingrediente'));
    }
    public function storeIngredientInfo(Request $request, $ingredienteID)
    {
        $ingredienteInfo = new IngredientInfo;
        $ingredienteInfo->ingrediente_id = $ingredienteID;

        $this->storeOrUpdateIngrediente($request, $ingredienteInfo);
        return redirect()->route('employeeView');
    }
    public function updateIngrediente(Request $request, $ingredienteID)
    {
        $ingredientInfo = IngredientInfo::where('ingrediente_id', $ingredienteID)->first();
        $this->storeOrUpdateIngrediente($request, $ingredientInfo);
        return redirect()->route('employeeView');
    }
    public function storeOrUpdateIngrediente(Request $request, IngredientInfo $ingrediente)
    {
        $ingrediente->info = $request->info ? $request->info : '';
        $ingrediente->energie = $request->energie ? $request->energie : '';
        $ingrediente->fett = $request->fett ? $request->fett : '';
        $ingrediente->fattyacids = $request->fattyacids ? $request->fattyacids : '';
        $ingrediente->carbohydrates = $request->carbohydrates ? $request->carbohydrates : '';
        $ingrediente->fruitscarbohydrates = $request->fruitscarbohydrates ? $request->fruitscarbohydrates : '';
        $ingrediente->protein = $request->protein ? $request->protein : '';
        $ingrediente->salt = $request->salt ? $request->salt : '';
        $ingrediente->save();
    }
}