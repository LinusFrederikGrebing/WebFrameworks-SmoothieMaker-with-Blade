<?php

namespace App\Http\Controllers;
use App\Models\IngredienteType;
use App\Models\Ingrediente;
use Illuminate\Http\Request;
use Cart;
use App\Models\BottleSize;


class BottleSizeController extends Controller
{
    public function showBottleSizes()
    {
        if(Cart::count() > 0) {
            Cart::destroy();
        }
        $bottles = BottleSize::all();
        //return response()->json(['bottles' => $bottles ]);
        return view('steps/step1ChooseSize', compact('bottles'));
    }

    public function showInhalt(Request $request, $bottleID)
    { 
        $bottle = BottleSize::findOrFail($bottleID);
        $request->session()->put('bottle', $bottle);
        //return response()->json([]);
        $zutaten = Ingrediente::where('type', IngredienteType::FRUITS)->get();
        return view('steps/step2ChooseIngrediente', compact('zutaten'));
    }

}
