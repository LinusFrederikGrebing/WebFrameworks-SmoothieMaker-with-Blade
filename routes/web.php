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
    Route::get('/dashboard',  [App\Http\Controllers\GateController::class, 'show'])->name('dashboard');
    Route::get('/dashboard/Veggie',  [App\Http\Controllers\GateController::class, 'showVeggieEmployee'])->name('dashboardVeggie');
    Route::get('/dashboard/Liquid',  [App\Http\Controllers\GateController::class, 'showLiquidEmployee'])->name('dashboardLiquid');
});


//Bottle-Size-Routes
Route::get('/custom/bottleSize', [App\Http\Controllers\BottleSizeController::class, 'showBottleSizes'])->name('showBottleSizes');
Route::get('/schritt1/{bottle}', [App\Http\Controllers\BottleSizeController::class, 'showInhalt'])->name('showInhalt');

//Ingrediente-Routes
Route::get('/custom/fruits', [App\Http\Controllers\IngredienteController::class, 'showFruits'])->name('showFruits');
Route::get('/custom/veggie', [App\Http\Controllers\IngredienteController::class, 'showVeggie'])->name('showVeggie');
Route::get('/custom/liquids', [App\Http\Controllers\IngredienteController::class, 'showLiquids'])->name('showLiquids');
Route::get('/create', [App\Http\Controllers\IngredienteController::class, 'create'])->name('create');
Route::post('/create/ingrediente', [App\Http\Controllers\IngredienteController::class, 'store'])->name('createIngrediente');
Route::post('/delete/ingrediente/{zutat}', [App\Http\Controllers\IngredienteController::class, 'deleteIngediengte'])->name('deleteZutat');
Route::post('/updated/ingrediente/{zutat}', [App\Http\Controllers\IngredienteController::class, 'updateIngrediente']);
Route::post('/update/ingrediente/{zutat}', [App\Http\Controllers\IngredienteController::class, 'showUpdateField'])->name('update');


Route::get('/cart/count', [App\Http\Controllers\ShoppingCartController::class, 'getCurrentCartCount']);

//ShoppingCard-Routes
Route::post('/addCart/{ingredienteId}', [App\Http\Controllers\ShoppingCartController::class, 'storeIngredienteToCart'])->name('storeInCart');
Route::post('/deleteCart/{carditem}', [App\Http\Controllers\ShoppingCartController::class, 'deleteCart'])->name('deleteCart');
Route::get('/removeAll', [App\Http\Controllers\ShoppingCartController::class, 'removeAllFromCartList']);
Route::post('/increaseCardQty/{carditem}', [App\Http\Controllers\ShoppingCartController::class, 'increaseCardQty'])->name('increaseCardQty');
Route::post('/decreaseCardQty/{carditem}', [App\Http\Controllers\ShoppingCartController::class, 'decreaseCardQty'])->name('decreaseCardQty');
Route::get('/showCard', [App\Http\Controllers\ShoppingCartController::class, 'showCard'])->name('showCard');

Route::get('/getCurrentLiquid', [App\Http\Controllers\ShoppingCartController::class, 'getCurrentLiquid']);
Route::get('/getCurrentBottle', [App\Http\Controllers\ShoppingCartController::class, 'getCurrentBottle']);