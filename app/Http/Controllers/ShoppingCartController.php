<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\BottleSize;
use App\Models\Ingrediente;
use Alert;
use App\Models\IngredienteType;
class ShoppingCartController extends Controller
{
    public function storeIngredienteToCart(Request $request, $ingredienteID)
    {
        $ingrediente = Ingrediente::findOrFail($ingredienteID); 

        $bottle = $this->getBottle($request);

        $liquidItems = $this->getCurrentLiquidItem();
          
        $total_amount = ($liquidItems->isNotEmpty()) ? $bottle->amount + 1 : $bottle->amount;
    
        if($ingrediente->type == 'liquid'){
            foreach ($liquidItems as $item) { 
                Cart::remove($item->rowId);
            }
            $this->addToCart($ingrediente, $request->amount);
        } else {
            $can_add_to_cart = (Cart::count() + $request->amount) <= $total_amount;
            if($can_add_to_cart){
               $this->addToCart($ingrediente, $request->amount);
            } else {
               return response()->json(['stored' => false]);
            }
        }
        return response()->json(['stored' => true, 'image' => $ingrediente->image]);
    }
    private function getBottle(Request $request)
    {
        if ($request->session()->get('bottle') == true) {
            return $request->session()->get('bottle');
        } else {
            return BottleSize::findOrFail("4");
        }
    }
    private function getCurrentLiquidItem(){
        return Cart::content()->filter(function($item) {
            return $item->options->type == 'liquid';
        });
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
    public function getCurrentCartCount(Request $request)
    {
        $bottle = $this->getBottle($request);
        $liquidItems = $this->getCurrentLiquidItem();
        $cartcount = ($liquidItems->isNotEmpty()) ?  Cart::count() - 1 : Cart::count();
        $liquidCount = ($liquidItems->isNotEmpty()) ?  1 : 0;
        return response()->json(['cartCount' => $cartcount, 'bottle' => $bottle, 'liquidCount' => $liquidCount]);
    }
    public function getCurrentLiquid(Request $request)
    {
        $liquidItems = Cart::content()->filter(function($item) {
            return $item->options->type === 'liquid';
        });
        return response()->json(['liquidItems' => $liquidItems], 200);
    }
    public function getCurrentCartContent(Request $request)
    {
        $cart = Cart::content();
        return response()->json(['cart' => $cart]);
    }
    public function getCurrentCartTotal(Request $request)
    {
        $cartTotal = Cart::total();
        $cartSubTotal = Cart::subtotal();
        return response()->json(['cartTotal' => $cartTotal, 'cartSubTotal' => $cartSubTotal]);
    }
    public function getCurrentBottle(Request $request)
    {
        $bottle = $this->getBottle($request);
        return response()->json(['bottle' => $bottle]);
    }
    public function removeAllFromCartList(Request $request)
    {
        Cart::destroy();
        return [];
    }

    public function increaseCardQty(Request $request, $ingredienteID)
    {   
        $bottle = $this->getBottle($request);
        $liquidItems = $this->getCurrentLiquidItem();
        $total_amount = ($liquidItems->isNotEmpty()) ? $bottle->amount + 1 : $bottle->amount;
        
        if (Cart::count() < $total_amount) {
            $newqty = Cart::get($ingredienteID)->qty + 1;
            Cart::update($ingredienteID, $newqty); 
            return response()->json(['stored' => true, 'image' => Cart::get($ingredienteID)->options->image, 'newqty' => $newqty]);
        }
        return response()->json(['stored' => false]);
    }
    public function decreaseCardQty(Request $request, $ingredienteID)
    {
        $cart_item =  Cart::get($ingredienteID);
        $image = $cart_item->options->image;
        $newqty = $cart_item->qty - 1;
        Cart::update($ingredienteID, $newqty); 
        return response()->json(['image' => $image, 'newqty' => $newqty]);
    }


    public function deleteCart(Request $request, $ingredienteID)
    {
        $item = Cart::get($ingredienteID);
        $wasLiquid = ($item->options->type == 'liquid') ? true : false;
        $image = $item->options->image;
        Cart::remove($ingredienteID);
        return response()->json(['image' => $image, 'wasLiquid' => $wasLiquid]);
    }

    public function removeAllFromCard(Request $request)
    {
        Cart::destroy();
        $bottle = $this->getBottle($request);
        $ingredients = Cart::content()->filter(function ($item) {
            return $item->options->type === IngredienteType::FRUITS || $item->options->type === IngredienteType::VEGETABLES;
        });
        $liquids = Cart::content()->reject(function ($item) {
            return $item->options->type === IngredienteType::LIQUID;
        });
        return view('steps/step3ShopComponent', compact('ingredients', 'liquids', 'bottle'));
    }



    public function showCard(Request $request)
    {  
        $bottle = $this->getBottle($request);
        $ingredients = Cart::content()->filter(function ($item) {
            return $item->options->type === IngredienteType::FRUITS || $item->options->type === IngredienteType::VEGETABLES;
        });
        $liquids = Cart::content()->filter(function ($item) {
            return $item->options->type === IngredienteType::LIQUID;
        });
        return view('steps/step3ShopComponent', compact('ingredients', 'liquids', 'bottle'));
    }
 
}
