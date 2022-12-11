<?php

use App\Http\Controllers\RequestController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function (Request $request){
    return "It's test backend response!";
});

Route::prefix('/request')
    ->controller(RequestController::class)
    ->group(function (){
        Route::get('/list', 'list');

        Route::get('/{request}', 'get');
        Route::post('/', 'create');
        Route::put('/{request}', 'update');
        Route::delete('/{request}', 'delete');
    });





