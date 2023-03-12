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
    public function getCurrentBottle(Request $request)
    {
        $bottle = $this->getBottle($request);
        return response()->json(['bottle' => $bottle]);
    }

    public function deleteCart(Request $request, $ingredienteID)
    {
        $image = Cart::get($ingredienteID)->options->image;
        $count = Cart::count()-Cart::get($ingredienteID)->qty;   
        Cart::remove($ingredienteID);
        return response()->json(['image' => $image, 'count' => $count, 'amount' => $request->session()->get('bottle')->amount]);
    }

    public function removeAllFromCard(Request $request)
    {
        Cart::destroy();
        Alert::info('', 'Der Warenkorb wurde erfolgreich geleert!');
        return view('steps/step3ShopComponent');
    }


    public function increaseCardQty(Request $request, $ingredienteID)
    {
        if (Cart::count() < $request->session()->get('bottle')->amount) {
            $id = Cart::get($ingredienteID)->id;
            $newqty = Cart::get($ingredienteID)->qty + 1;
            Cart::update($ingredienteID, $newqty); // Will update the quantity
            return response()->json(['image' => Cart::get($ingredienteID)->options->image, 'count' => Cart::count(), 'newqty' => $newqty, 'amount' => $request->session()->get('bottle')->amount, 'id' => $id]);
        }
    }

    public function decreaseCardQty(Request $request, $ingredienteID)
    {
        $image = Cart::get($ingredienteID)->options->image;
        $id = Cart::get($ingredienteID)->id;
        $count = Cart::count()-1;   
        $newqty = Cart::get($ingredienteID)->qty - 1;
        Cart::update($ingredienteID, $newqty); // Will update the quantity
        return response()->json(['image' => $image, 'count' => $count, 'newqty' => $newqty, 'amount' => $request->session()->get('bottle')->amount, 'id' => $id]);
    }

    public function showCard(Request $request)
    {  
        if ($request->session()->get('bottle') == true) {
            $bottle = $request->session()->get('bottle');
        } else {
             $bottle = BottleSize::findOrFail("4");
        }

        return view('steps/step3ShopComponent')->with('bottle', $bottle);
    }
}
