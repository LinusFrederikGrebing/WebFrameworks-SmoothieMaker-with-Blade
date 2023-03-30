<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// The Cart component is session-based.
use Cart;
use App\Models\BottleSize;
use App\Models\Ingredient;
use App\Models\IngredientType;

class ShoppingCartController extends Controller
{
    // Add ingredient to cart
    public function storeIngredientToCart(Request $request, $ingredientID)
    {
        // Find the ingredient by ID
        $ingredient = Ingredient::findOrFail($ingredientID);
        // Get the current bottle
        $bottle = $this->getBottle($request);
        // Get the current liquid items in the cart, if there is one
        $liquidItems = $this->getCurrentLiquidItem();
        // Calculate the total amount of items allowed in the cart. Each composition requires a liquid and the amount stored in the bottle. If there is a liquid, the allowed amount must be increased by one
        $total_amount = ($liquidItems->isNotEmpty()) ? $bottle->amount + 1 : $bottle->amount;
        
        // If the ingredient is a liquid, remove all other liquid items from the cart and add the new one
        if ($ingredient->type == 'liquid') {
            foreach ($liquidItems as $item) {
                Cart::remove($item->rowId);
            }
            $this->addToCart($ingredient, $request->amount);
        } else {
            // If the ingredient is not a liquid, check if there is enough space in the cart to add it
            $can_add_to_cart = (Cart::count() + $request->amount) <= $total_amount;
            if ($can_add_to_cart) {
                $this->addToCart($ingredient, $request->amount);
            } else {
                return response()->json(['stored' => false]);
            }
        }
        return response()->json(['stored' => true, 'image' => $ingredient->image]);
    }
    // Increase the quantity of an item in the cart
    public function increaseCardQty(Request $request, $ingredientID)
    {
        // Get the current bottle
        $bottle = $this->getBottle($request);
        // Get the current liquid items in the cart, if there is one
        $liquidItems = $this->getCurrentLiquidItem();
        // Calculate the total amount of items allowed in the cart
        $total_amount = ($liquidItems->isNotEmpty()) ? $bottle->amount + 1 : $bottle->amount;

        // If there is enough space in the cart, increase the item's quantity
        if (Cart::count() < $total_amount) {
            $newqty = Cart::get($ingredientID)->qty + 1;
            Cart::update($ingredientID, $newqty);
            return response()->json(['stored' => true, 'image' => Cart::get($ingredientID)->options->image, 'newqty' => $newqty]);
        }
        return response()->json(['stored' => false]);
    }
    // Decrease the quantity of an item in the cart
    public function decreaseCardQty(Request $request, $ingredientID)
    {
        $cart_item = Cart::get($ingredientID);
        $image = $cart_item->options->image;
        $newqty = $cart_item->qty - 1;
        Cart::update($ingredientID, $newqty);
        return response()->json(['image' => $image, 'newqty' => $newqty]);
    }
    // Delete an item from the cart
    public function deleteCart(Request $request, $ingredientID)
    {
        // Get the item from the cart using ID
        $item = Cart::get($ingredientID);
        $wasLiquid = ($item->options->type == 'liquid') ? true : false;
        $image = $item->options->image;
        // Remove the item from the cart
        Cart::remove($ingredientID);
        return response()->json(['image' => $image, 'wasLiquid' => $wasLiquid]);
    }
    // remove all from the ShoppingCart
    public function removeAllFromCartList(Request $request)
    {
        Cart::destroy();
        $bottle = $this->getBottle($request);
        $ingredients = Cart::content()->filter(function ($item) {
            return $item->options->type === IngredientType::FRUITS || $item->options->type === IngredientType::VEGETABLES;
        });
        $liquids = Cart::content()->reject(function ($item) {
            return $item->options->type === IngredientType::LIQUID;
        });
        return view('steps/shopComponent', compact('ingredients', 'liquids', 'bottle'));
    }
    // returns the view with a ingredient and a liquidlist
    public function showCard(Request $request)
    {
        $bottle = $this->getBottle($request);
        $ingredients = Cart::content()->filter(function ($item) {
            return $item->options->type === IngredientType::FRUITS || $item->options->type === IngredientType::VEGETABLES;
        });
        $liquids = Cart::content()->filter(function ($item) {
            return $item->options->type === IngredientType::LIQUID;
        });
        return view('steps/shopComponent', compact('ingredients', 'liquids', 'bottle'));
    }
    public function getCurrentCartCount(Request $request)
    {
        $bottle = $this->getBottle($request);
        // Get the current liquid items in the cart, if there is one
        $liquidItems = $this->getCurrentLiquidItem();
        $cartcount = ($liquidItems->isNotEmpty()) ? Cart::count() - 1 : Cart::count();
        $liquidCount = ($liquidItems->isNotEmpty()) ? 1 : 0;
        return response()->json(['cartCount' => $cartcount, 'bottle' => $bottle, 'liquidCount' => $liquidCount]);
    }
    public function getCurrentLiquid(Request $request)
    {
        // Get the current liquid items in the cart, if there is one
        $liquidItems = $this->getCurrentLiquidItem(); 
        return response()->json(['liquidItems' => $liquidItems], 200);
    }
    public function getCurrentCartContent(Request $request)
    {
        // Get all Ingredients from the Cart
        $cart = Cart::content();
        return response()->json(['cart' => $cart]);
    }
    // Get the information about the current cost to update it in the view
    public function getCurrentCartTotal(Request $request)
    {
        $cartTotal = Cart::total();
        $cartSubTotal = Cart::subtotal();
        return response()->json(['cartTotal' => $cartTotal, 'cartSubTotal' => $cartSubTotal]);
    }
    // Get the BottleSize stored in the session and return it as json Object
    public function getCurrentBottle(Request $request)
    {
        $bottle = $this->getBottle($request);
        return response()->json(['bottle' => $bottle]);
    }
    // Get the BottleSize stored in the session
    private function getBottle(Request $request)
    {
        if ($request->session()->get('bottle') == true) {
            return $request->session()->get('bottle');
        } else {
            return BottleSize::findOrFail("4");
        }
    }
    // Get the current liquid items in the cart, if there is one
    private function getCurrentLiquidItem()
    {
        return Cart::content()->filter(function ($item) {
            return $item->options->type == 'liquid';
        });
    }
    // Adds an ingredient item to the Cart based on the passed ingredient with the passed amount as qty
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