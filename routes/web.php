<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/home',  [App\Http\Controllers\GateController::class, 'show'])->name('home');
    Route::get('/dashboard/Veggie',  [App\Http\Controllers\GateController::class, 'showVeggieEmployee'])->name('dashboardVeggie');
    Route::get('/dashboard/Liquid',  [App\Http\Controllers\GateController::class, 'showLiquidEmployee'])->name('dashboardLiquid');
});

Route::get('/custom/fruits', [App\Http\Controllers\IngredienteController::class, 'showFruits'])->name('showFruits');
Route::get('/custom/veggie', [App\Http\Controllers\IngredienteController::class, 'showVeggie'])->name('showVeggie');
Route::get('/custom/liquids', [App\Http\Controllers\IngredienteController::class, 'showLiquids'])->name('showLiquids');

//Bottle-Size-Routes
Route::get('/bottleSize', [App\Http\Controllers\BottleSizeController::class, 'showBottleSizes'])->name('showBottleSizes');
Route::get('/schritt1/{bottle}', [App\Http\Controllers\BottleSizeController::class, 'showInhalt'])->name('showInhalt');

//ShoppingCard-Routes
Route::post('/deleteCart/{carditem}', [App\Http\Controllers\ShoppingCartController::class, 'deleteCart'])->name('deleteCart');
Route::post('/increaseCardQty/{carditem}', [App\Http\Controllers\ShoppingCartController::class, 'increaseCardQty'])->name('increaseCardQty');
Route::post('/decreaseCardQty/{carditem}', [App\Http\Controllers\ShoppingCartController::class, 'decreaseCardQty'])->name('decreaseCardQty');
Route::get('/cart/count', [App\Http\Controllers\ShoppingCartController::class, 'getCurrentCartCount']);
Route::get('/cartContent', [App\Http\Controllers\ShoppingCartController::class, 'getCurrentCartContent']);
Route::get('/cartTotal', [App\Http\Controllers\ShoppingCartController::class, 'getCurrentCartTotal']);
Route::post('/addCart/{ingrediente}', [App\Http\Controllers\ShoppingCartController::class, 'storeIngredienteToCart'])->name('storeInCart');
Route::get('/removeAll', [App\Http\Controllers\ShoppingCartController::class, 'removeAllFromCartList']);
Route::get('/getCurrentLiquid', [App\Http\Controllers\ShoppingCartController::class, 'getCurrentLiquid']);
Route::get('/getCurrentBottle', [App\Http\Controllers\ShoppingCartController::class, 'getCurrentBottle']);
Route::get('/showCard', [App\Http\Controllers\ShoppingCartController::class, 'showCard'])->name('showCard');