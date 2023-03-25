<?php

namespace App\Http\Controllers;

use App\Models\IngredienteType;
use Illuminate\Http\Request;
use App\Models\Ingrediente;
use Alert;

class IngredienteController extends Controller
{
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

    public function create()
    {
        return view('ingrediente/createIngrediente');
    }

    public function showUpdateField(Request $request, $ingredienteID)
    {
        $ingrediente = Ingrediente::findOrFail($ingredienteID);
        return view('ingrediente/updateIngrediente', compact('ingrediente'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image'],
        ]);

        $ingredient = new Ingrediente;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('images/piece/', $filename);
            $ingredient->image = $filename;
        } else {
            $ingredient->image = '';
            return $request;
        }
        $ingredient->name = $request->name;
        $ingredient->amount = $request->amount;
        $ingredient->price = $request->price;
        $ingredient->type = $request->type;
        $ingredient->save();
        return redirect()->route('employeeView')->with('alert', ['id' => $ingredient->id]);
    }
    public function deleteIngediengte(Request $request, $ingredienteID)
    {
        $ingredient = Ingrediente::find($ingredienteID);
        $ingredient->delete($ingredient->id);
        Alert::success('', 'Die Zutat wurde erfolgreich gelöscht!');
        return redirect()->back();
    }
    public function updateIngrediente(Request $request, $ingredienteID)
    {
        $ingredient = Ingrediente::find($ingredienteID);

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
        Alert::success('', 'Die Zutat wurde erfolgreich aktualisiert!');
        return redirect('/employee');
    }
}