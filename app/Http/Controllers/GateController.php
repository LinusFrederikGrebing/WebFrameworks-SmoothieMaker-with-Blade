<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingrediente;
use App\Models\IngredienteType;

class GateController extends Controller
{
    public function show()
    {
        $ingredients = Ingrediente::where('type', IngredienteType::FRUITS)->get();

        return view('home', compact('ingredients'));
    }
    public function showVeggieEmployee(Request $request)
    {
        $ingredients = Ingrediente::where('type', IngredienteType::VEGETABLES)->get();

        return view('home', compact('ingredients'));
    }
    public function showLiquidEmployee(Request $request)
    {
        $ingredients = Ingrediente::where('type', IngredienteType::LIQUID)->get();

        return view('home', compact('ingredients'));
    }
}
