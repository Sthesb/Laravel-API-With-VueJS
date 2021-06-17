<?php

use App\Http\Controllers\TodosController;
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



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/todos', [TodosController::class, 'index']);
Route::prefix('/todo')->group( function () {
    Route::post('/store', [TodosController::class, 'store']);
    Route::put('/{id}', [TodosController::class, 'update']);
    Route::delete('/{id}', [TodosController::class, 'destroy']);
});
