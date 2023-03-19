<?php

namespace App\Http\Controllers;

use App\Models\Preset;
use App\Models\BottleSize;
use Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PresetController extends Controller
{
    public function checkPreset(Request $request, $name)
    {
        Cart::destroy();
        $preset = Preset::where('name', $name)->first();
        $bottle = BottleSize::findOrFail($preset->bottle_id);
        $request->session()->put('bottle', $bottle);
        $ingredients = $preset->ingredients;
        foreach ($ingredients as $ingredient) {
            $this->addToCart($ingredient, $ingredient->pivot->quantity);
        }
        return response()->json(['ingrediente' => $preset]);
    }
    public function deleteUserPreset(Request $request, $name)
    {
        $preset = Preset::where('name', $name)->first();
        $preset->delete($preset->id);   
    }
    public function storeAsPreset(Request $request)
    {
        $name = $request->input('name');
        if (!Auth::check()) { 
            return response()->json(['auth' => false]);
        }
        $user = Auth::user();
        $userId = $user->id;
        $bottle = $request->session()->get('bottle');
        $preset = new Preset(['name' => $name, 'user_id' => $userId, 'bottle_id' => $bottle->id]);
        $preset->save();
        foreach (Cart::content() as $item) {
            $ingredients[$item->id] = ['quantity' => $item->qty]; 
        }

        $preset->ingredients()->attach($ingredients);
      
       
        return response()->json(['ingrediente' => $preset]);
    }
    private function addToCart($ingrediente, $amount){
        Cart::add([
            'id' => $ingrediente->id,
            'name' => $ingrediente->name,
            'qty' => $amount,
            'price' => $ingrediente->price,
            'options' => [
                'image' => $ingrediente->image,
                'type' =>  $ingrediente->type,
            ],
        ]);
    }
    public function getUserPresets()
    {
        if (!Auth::check()) { 
            return response()->json(['auth' => false]);
        }
        $user = Auth::user();
        $userPresets = Preset::where('user_id', $user->id)->pluck('name');
        return response()->json(['userPresets' => $userPresets]);
    }
}
