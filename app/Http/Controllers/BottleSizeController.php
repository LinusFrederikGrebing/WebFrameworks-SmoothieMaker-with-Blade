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
        return view('steps/step1ChooseBottleSize', compact('bottles'));
    }

    public function showInhalt(Request $request, $bottleID)
    { 
        $bottle = BottleSize::findOrFail($bottleID);
        $request->session()->put('bottle', $bottle);
        //return response()->json([]);
        return redirect()->route('showFruits');
    }

}
