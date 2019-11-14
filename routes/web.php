<?php

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

Auth::routes();

// Home
Route::get('/home', 'HomeController@index')->name('home');

// Employee
Route::get('/employees', 'EmployeeController@index2', function () {
    //whatever
})->middleware('auth')->name('employee');
Route::get('employees/add', 'EmployeeController@add', function () {
    //whatever
})->middleware('auth')->name('add-employee');

// Order
Route::get('/orders', 'OrderController@index2', function () {
    //whatever
})->middleware('auth')->name('order');

// Prescription
Route::get('/prescriptions', 'PrescriptionController@index2', function () {
    //whatever
})->middleware('auth')->name('prescription');

// Sale
Route::get('/sales', 'SaleController@index2', function () {
    //whatever
})->middleware('auth')->name('sale');

// Stock
Route::get('/stocks', 'StockController@index2', function () {
    //whatever
})->middleware('auth')->name('stock');