<?php

namespace App\Http\Controllers;

use App\Models\IngredienteType;
use Illuminate\Http\Request;
use App\Models\Ingrediente;

class IngredienteController extends Controller
{
    // If the User selects one of the following lists while step, the respective list of ingredients should be returned
    public function showFruits(Request $request)
    {
        $ingredients = Ingrediente::where('type', IngredienteType::FRUITS)->get();
        return view('steps/step2ChooseIngrediente', compact('ingredients'));
    }
    public function showVeggie(Request $request)
    {
        $ingredients = Ingrediente::where('type', IngredienteType::VEGETABLES)->get();
        return view('steps/step2ChooseIngrediente', compact('ingredients'));
    }
    public function showLiquids(Request $request)
    {
        $ingredients = Ingrediente::where('type', IngredienteType::LIQUID)->get();
        return view('steps/step3ChooseLiquid', compact('ingredients'));
    }
    // returns the view to create an Ingredient
    public function create()
    {
        return view('ingrediente/createIngrediente');
    }
    // return the ingredient to be updated in the form
    public function showUpdateField(Request $request, $ingredienteID)
    {
        $ingrediente = Ingrediente::findOrFail($ingredienteID);
        return view('ingrediente/updateIngrediente', compact('ingrediente'));
    }

    // create a new ingredient instance and add the information from the request
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image'],
        ]);
        $ingredient = new Ingrediente;
        $this->storeOrUpdateIngrediente($request, $ingredient);
        return redirect()->route('employeeView')->with('alert', ['id' => $ingredient->id]);
    }
    // gets a reference to the ingredient instance and adds the information from the request
    public function updateIngrediente(Request $request, $ingredienteID)
    {
        $request->validate([
            'image' => ['image'],
        ]);
        $ingrediente = Ingrediente::find($ingredienteID);
        $this->storeOrUpdateIngrediente($request, $ingrediente);
        return redirect('/employee');
    }
    // The file must be specially considered and validated. When creating the ingredient, sending without an entry is prevented in the frontend. 
    // There doesn't have to be any change in the case of updates.
    public function storeOrUpdateIngrediente(Request $request, Ingrediente $ingrediente)
    { 
        if ($request->name != null) {
            $ingrediente->name = $request->name;
        }
        if ($request->amount != null) {
            $ingrediente->amount = $request->amount;
        }
        if ($request->price != null) {
            $ingrediente->price = $request->price;
        }
        if ($request->type != null) {
            $ingrediente->type = $request->type;
        }
        if ($request->hasfile('image')) {
            $request->validate([
                'image' => ['required', 'image'],
            ]);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('images/piece/', $filename);
            $ingrediente->image = $filename;
        }
        $ingrediente->save();
    }
    // Deletes the passed ingredient from the database
    public function deleteIngediengte(Request $request, $ingredienteID)
    {
        $ingredient = Ingrediente::find($ingredienteID);
        $ingredient->delete($ingredient->id);
        return redirect()->back();
    }
}