<?php

namespace App\Http\Controllers;

use App\Models\IngredientType;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    // If the User selects one of the following lists while step, the respective list of ingredients should be returned
    public function showFruits(Request $request)
    {
        $ingredients = Ingredient::where('type', IngredientType::FRUITS)->get();
        return view('steps/step2ChooseIngredient', compact('ingredients'));
    }
    public function showVeggie(Request $request)
    {
        $ingredients = Ingredient::where('type', IngredientType::VEGETABLES)->get();
        return view('steps/step2ChooseIngredient', compact('ingredients'));
    }
    public function showLiquids(Request $request)
    {
        $ingredients = Ingredient::where('type', IngredientType::LIQUID)->get();
        return view('steps/step3ChooseLiquid', compact('ingredients'));
    }
    // returns the view to create an Ingredient
    public function create()
    {
        return view('ingredient/createIngredient');
    }
    // return the ingredient to be updated in the form
    public function showUpdateField(Request $request, $ingredientID)
    {
        $ingredient = Ingredient::findOrFail($ingredientID);
        return view('ingredient/updateIngredient', compact('ingredient'));
    }

    // create a new ingredient instance and add the information from the request
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image'],
        ]);
        $ingredient = new Ingredient;
        $this->storeOrUpdateIngredient($request, $ingredient);
        return redirect()->route('employeeView')->with('alert', ['id' => $ingredient->id]);
    }
    // gets a reference to the ingredient instance and adds the information from the request
    public function updateIngredient(Request $request, $ingredientID)
    {
        $request->validate([
            'image' => ['image'],
        ]);
        $ingredient = Ingredient::find($ingredientID);
        $this->storeOrUpdateIngredient($request, $ingredient);
        return redirect('/employee');
    }
    // The file must be specially considered and validated. When creating the ingredient, sending without an entry is prevented in the frontend. 
    // There doesn't have to be any change in the case of updates.
    public function storeOrUpdateIngredient(Request $request, Ingredient $ingredient)
    { 
        if ($request->name != null) {
            $ingredient->name = $request->name;
        }
        if ($request->amount != null) {
            $ingredient->amount = $request->amount;
        }
        if ($request->price != null) {
            $ingredient->price = $request->price;
        }
        if ($request->type != null) {
            $ingredient->type = $request->type;
        }
        if ($request->hasfile('image')) {
            $request->validate([
                'image' => ['required', 'image'],
            ]);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('images/piece/', $filename);
            $ingredient->image = $filename;
        }
        $ingredient->save();
    }
    // Deletes the passed ingredient from the database
    public function deleteIngediengte(Request $request, $ingredientID)
    {
        $ingredient = Ingredient::find($ingredientID);
        $ingredient->delete($ingredient->id);
        return redirect()->back();
    }
}