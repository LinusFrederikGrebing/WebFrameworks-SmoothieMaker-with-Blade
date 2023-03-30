<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngredientInfo;
use App\Models\Ingredient;

class IngredientInfoController extends Controller
{
    // return the ingredient information for a specific ingredient
    public function getIngredientInfo(Request $request, $id)
    {
        $ingredientInfo = IngredientInfo::where('ingredient_id', $id)->first();
        return response()->json(['ingredientInfo' => $ingredientInfo]);
    }
    // returns the view with the Ingredient for which the information should be updated
    public function showUpdateField(Request $request, $ingredientID)
    {
        $ingredient = Ingredient::findOrFail($ingredientID);
        $ingredientInfo = IngredientInfo::where('ingredient_id', $ingredientID)->first();
        return view('ingredient/changeIngredientInfo', compact('ingredient', 'ingredientInfo'));
    }
    // returns the view with the Ingredient for which the information should be created
    public function showCreateIngredient($ingredientID)
    {
        $ingredient = Ingredient::findOrFail($ingredientID);
        return view('ingredient/createIngredientInfo', compact('ingredient'));
    }
     // create an IngredientInfo instance and fill it with the data from the request
    public function storeIngredientInfo(Request $request, $ingredientID)
    {
        $ingredientInfo = new IngredientInfo;
        $ingredientInfo->ingredient_id = $ingredientID;

        $this->storeOrUpdateIngredient($request, $ingredientInfo);
        return redirect()->route('employeeView');
    }
     // get a reference to the existing IngredientInfo instance and update it with the data from the request
    public function updateIngredient(Request $request, $ingredientID)
    {
        $ingredientInfo = IngredientInfo::where('ingredient_id', $ingredientID)->first();
        $this->storeOrUpdateIngredient($request, $ingredientInfo);
        return redirect()->route('employeeView');
    }
    // the ingredient information can be empty. If nothing was passed, just write an empty string to the database
    public function storeOrUpdateIngredient(Request $request, IngredientInfo $ingredient)
    {
        $ingredient->info = $request->info ? $request->info : '';
        $ingredient->energie = $request->energie ? $request->energie : '';
        $ingredient->fett = $request->fett ? $request->fett : '';
        $ingredient->fattyacids = $request->fattyacids ? $request->fattyacids : '';
        $ingredient->carbohydrates = $request->carbohydrates ? $request->carbohydrates : '';
        $ingredient->fruitscarbohydrates = $request->fruitscarbohydrates ? $request->fruitscarbohydrates : '';
        $ingredient->protein = $request->protein ? $request->protein : '';
        $ingredient->salt = $request->salt ? $request->salt : '';
        $ingredient->save();
    }
}