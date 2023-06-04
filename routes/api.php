<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\customerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route:: group(['prefix'=>'v1','middleware'=>'auth:api'],function(){
    Route:: get('customer',[customerController::class,'index']);
    Route:: get('customer/{id}',[customerController::class,'show']);
    Route:: post('customer',[customerController::class, 'store']);
    Route::patch('customer/{id}',[customerController::class,'update']);
    Route::delete('customer/{id}',[customerController::class,'delete']);

});
