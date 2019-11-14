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

Route::apiResource('/sale', 'SaleController');
Route::apiResource('/employee', 'EmployeeController');
Route::apiResource('/order', 'OrderController');
Route::apiResource('/prescription', 'PrescriptionController');
Route::apiResource('/stock', 'StockController');
/*Route::get('/sale/{sale}', 'SaleController@show');*/
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
