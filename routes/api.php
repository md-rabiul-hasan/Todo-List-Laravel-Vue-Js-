<?php

use App\Http\Controllers\ItemController;
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

Route::group(['prefix' => 'item'], function(){
    Route::get('index', [ItemController::class, 'index']);
    Route::post('store', [ItemController::class, 'store']);
    Route::put('update/{id}', [ItemController::class, 'update']);
    Route::delete('delete/{id}', [ItemController::class, 'destroy']);
});
