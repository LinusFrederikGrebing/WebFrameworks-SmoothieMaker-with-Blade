<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Ingrediente-Routes
Route::get('/create', [App\Http\Controllers\IngredienteController::class, 'create'])->name('create');
Route::post('/delete/ingrediente/{ingrediente}', [App\Http\Controllers\IngredienteController::class, 'deleteIngediengte'])->name('deleteZutat');
Route::post('/updated/ingrediente/{ingrediente}', [App\Http\Controllers\IngredienteController::class, 'updateIngrediente']);
Route::post('/update/ingrediente/{ingrediente}', [App\Http\Controllers\IngredienteController::class, 'showUpdateField'])->name('update');
Route::post('/create/ingrediente', [App\Http\Controllers\IngredienteController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
