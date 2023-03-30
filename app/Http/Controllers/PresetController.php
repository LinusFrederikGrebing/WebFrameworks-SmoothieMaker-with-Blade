<?php

namespace App\Http\Controllers;

use App\Models\Preset;
use App\Models\BottleSize;
// The Cart component is session-based.
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PresetController extends Controller
{
    // add the preset ingredients of the selected preset to the shopping cart
    public function checkPreset(Request $request, $name)
    {
        $this->addExistingPresetToCart($request, $name);
        return response()->json([]);
    }
    // delete a user specific preset. The ondelete cascade also deletes the ingredients of the associated preset
    public function deleteUserPreset(Request $request, $name)
    {
        $preset = Preset::where('name', $name)->where('user_id', Auth::id())->firstOrFail();
        $preset->delete($preset->id);
    }
    // checks if the user is authorized and checks if the authorized user already has a preset under the name and if not, creates the preset
    public function storeAsPreset(Request $request)
    {
        $name = $request->input('name');
        if (!Auth::check()) {
            return response()->json(['auth' => false]);
        }
        if (Preset::where('name', $name)->where('user_id', Auth::user()->id)->exists()) {
            return response()->json(['error' => 'Ein Preset mit diesem Namen existiert bereits für diesen Benutzer.'], 422);
        }
        $bottle = $request->session()->get('bottle');
        $this->createPreset($name, Auth::user()->id, $bottle->id);
        return response()->json([]);
    }
    // checks if the user is authorized and checks if the authorized user already has a preset with the name and if not, load the existing preset to then save it user-specifically
    public function storeExistingPreset(Request $request, $name)
    {
        if (!Auth::check()) {
            return response()->json(['auth' => false]);
        }
        if (Preset::where('name', $name)->where('user_id', Auth::user()->id)->exists()) {
            return response()->json(['error' => 'Ein Preset mit diesem Namen existiert bereits für diesen Benutzer.'], 422);
        }
        $bottle = $this->addExistingPresetToCart($request, $name);
        $this->createPreset($name, Auth::user()->id, $bottle->id);

        return response()->json([]);
    }
    // creates the user-specific preset and the associated ingredients
    public function createPreset($name, $userId, $bottleId)
    {
        $newPreset = new Preset(['name' => $name, 'user_id' => $userId, 'bottle_id' => $bottleId]);
        $newPreset->save();
        foreach (Cart::content() as $item) {
            $presetIngredients[$item->id] = ['quantity' => $item->qty];
        }
        $newPreset->ingredients()->attach($presetIngredients);
    }
    // returns a json object with all user specific presets
    public function getUserPresets()
    {
        if (!Auth::check()) {
            return response()->json(['auth' => false]);
        }
        $userPresets = Preset::where('user_id', Auth::user()->id)->pluck('name');
        return response()->json(['userPresets' => $userPresets]);
    }
    // gets the preset and adds the ingredients of the preset to the shopping cart
    private function addExistingPresetToCart($request, $name)
    {
        Cart::destroy();
        $preset = Preset::where('name', $name)->first();
        $bottle = BottleSize::findOrFail($preset->bottle_id);
        $request->session()->put('bottle', $bottle);
        $ingredients = $preset->ingredients;
        foreach ($ingredients as $ingredient) {
            $this->addToCart($ingredient, $ingredient->pivot->quantity);
        }
        return $bottle;
    }
    // add an ingredient to the shopping cart
    private function addToCart($ingredient, $amount)
    {
        Cart::add([
            'id' => $ingredient->id,
            'name' => $ingredient->name,
            'qty' => $amount,
            'price' => $ingredient->price,
            'options' => [
                'image' => $ingredient->image,
                'type' => $ingredient->type,
            ],
        ]);
    }
}