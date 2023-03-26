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
    return view('landingPageTemplate');
})->name('/');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/home', [App\Http\Controllers\GateController::class, 'show'])->name('home');
    Route::get('/employee/Fruits', [App\Http\Controllers\GateController::class, 'showFruitsEmployee'])->name('showFruitsEmployee');
    Route::get('/employee/Veggie', [App\Http\Controllers\GateController::class, 'showVeggieEmployee'])->name('showVeggieEmployee');
    Route::get('/employee/Liquid', [App\Http\Controllers\GateController::class, 'showLiquidEmployee'])->name('showLiquidEmployee');
});

Route::get('/custom/fruits', [App\Http\Controllers\IngredienteController::class, 'showFruits'])->name('showFruits');
Route::get('/custom/veggie', [App\Http\Controllers\IngredienteController::class, 'showVeggie'])->name('showVeggie');
Route::get('/custom/liquids', [App\Http\Controllers\IngredienteController::class, 'showLiquids'])->name('showLiquids');

//Bottle-Size-Routes
Route::get('/bottleSize', [App\Http\Controllers\BottleSizeController::class, 'showBottleSizes'])->name('showBottleSizes');
Route::get('/custom/fruits/{bottle}', [App\Http\Controllers\BottleSizeController::class, 'showInhalt'])->name('showInhalt');

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

//Preset-Routes
Route::get('/checkPreset/{presetName}', [App\Http\Controllers\PresetController::class, 'checkPreset'])->name('checkPreset');
Route::post('/storeAsPreset', [App\Http\Controllers\PresetController::class, 'storeAsPreset'])->name('storeAsPreset');
Route::get('/storeExistingPreset/{presetName}', [App\Http\Controllers\PresetController::class, 'storeExistingPreset'])->name('storeExistingPreset');

Route::get('/user-presets', [App\Http\Controllers\PresetController::class, 'getUserPresets']);
Route::get('/deletePreset/{ingrediente}', [App\Http\Controllers\PresetController::class, 'deleteUserPreset'])->name('deletePreset');

//Ingrediente-Routes
Route::get('/create', [App\Http\Controllers\IngredienteController::class, 'create'])->name('create');
Route::post('/delete/ingrediente/{ingrediente}', [App\Http\Controllers\IngredienteController::class, 'deleteIngediengte'])->name('deleteZutat');
Route::post('/updated/ingrediente/{ingrediente}', [App\Http\Controllers\IngredienteController::class, 'updateIngrediente']);
Route::post('/update/ingrediente/{ingrediente}', [App\Http\Controllers\IngredienteController::class, 'showUpdateField'])->name('update');
Route::post('/create/ingrediente', [App\Http\Controllers\IngredienteController::class, 'store']);

Route::post('/create/ingredienteInfo/{ingredienteID}', [App\Http\Controllers\IngredientInfoController::class, 'storeIngredientInfo']);
Route::post('/update/ingredienteInfo/{ingredienteID}', [App\Http\Controllers\IngredientInfoController::class, 'updateIngrediente']);
Route::get('/showUpdate/ingredienteInfo/{ingredienteID}', [App\Http\Controllers\IngredientInfoController::class, 'showUpdateField']);
Route::get('/create-ingredient/{ingredienteID}', [App\Http\Controllers\IngredientInfoController::class, 'showCreateIngredient'])->name('createIngredient');


Route::get('/employee', [App\Http\Controllers\GateController::class, 'employeeView'])->name('employeeView');
Route::get('/customer', [App\Http\Controllers\GateController::class, 'customerView'])->name('customerView');

Route::get('/getIngredientInfo/{ingredientId}', [App\Http\Controllers\IngredientInfoController::class, 'getIngredientInfo'])->name('getIngredientInfo');