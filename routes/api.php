<?php

use Illuminate\Http\Request;
use App\Sale;
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

Route::apiResource('/sale', 'SaleController')->middleware('auth:api');
Route::apiResource('/employee', 'EmployeeController');//->middleware('auth:api');
Route::apiResource('/order', 'OrderController')->middleware('auth');
Route::apiResource('/prescription', 'PrescriptionController')->middleware('auth');
Route::apiResource('/stock', 'StockController')->middleware('auth');
/*Route::get('/sale/{sale}', 'SaleController@show');*/
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
