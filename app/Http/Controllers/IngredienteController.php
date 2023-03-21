<?php

namespace App\Http\Controllers;

use App\Models\IngredienteType;

use Illuminate\Http\Request;
use App\Models\Ingrediente;
use Alert;

class IngredienteController extends Controller
{

    private $test;
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

        $zutat = new Ingrediente;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('images/piece/', $filename);
            $zutat->image = $filename;
        } else {
            $zutat->image = '';
            return $request;
        }
        $zutat->name = $request->name;
        $zutat->amount = $request->amount;
        $zutat->price = $request->price;
        $zutat->type = $request->type;
        $zutat->save();
        Alert::success('', 'Die Zutat wurde erfolgreich hinzugefügt!');
        return redirect('/home');
    }
    public function deleteIngediengte(Request $request, $ingredienteID)
    {
        $zutat = Ingrediente::find($ingredienteID);
        $zutat->delete($zutat->id);
        Alert::success('', 'Die Zutat wurde erfolgreich gelöscht!');
        return redirect()->back();
    }
    public function updateIngrediente(Request $request, $ingredienteID)
    {
        $zutat = Ingrediente::find($ingredienteID);

        if ($request->name != null) {
            $zutat->name = $request->name;
        }
        if ($request->amount != null) {
            $zutat->amount = $request->amount;
        }
        if ($request->price != null) {
            $zutat->price = $request->price;
        }
        if ($request->type != null) {
            $zutat->type = $request->type;
        }


        if ($request->hasfile('image')) {
            $request->validate([
                'image' => ['required', 'image'],
            ]);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('images/piece/', $filename);
            $zutat->image = $filename;
        }

        $zutat->save();
        Alert::success('', 'Die Zutat wurde erfolgreich aktualisiert!');
        return redirect('/home');
    }
}