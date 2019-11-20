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

// --------------------- OAuth2 Facebook login
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

// --------------------- Home
Route::get('/home', 'HomeController@index')->name('home');

// --------------------- Employee
Route::get('/employees', 'EmployeeController@index2', function () {
    // get all employees list
})->middleware('auth')->name('employee');
Route::get('employees/add', 'EmployeeController@add', function () {
    // employee add form
})->middleware('auth')->name('employeeAdd');
Route::get('employees/added', 'EmployeeController@store2', function () {
    // submit employee
})->middleware('auth')->name('employeeAdded');
Route::get('employees/edit/{id}', 'EmployeeController@edit', function () {
    // employee edit form
})->middleware('auth')->name('employeeEdit');
Route::get('employees/edited/{id}', 'EmployeeController@update2', function () {
    // submit employee
})->middleware('auth')->name('employeeEdited');
Route::get('employees/delete/{id}', 'EmployeeController@delete', function() {
    // employee delete
})->middleware('auth')->name('employeeDelete');
//Route::apiResource('employee', 'EmployeeController');

// --------------------- Order
Route::get('/orders', 'OrderController@index2', function () {
    //whatever
})->middleware('auth')->name('order');

// --------------------- Prescription
Route::get('/prescriptions', 'PrescriptionController@index2', function () {
    //whatever
})->middleware('auth')->name('prescription');

// --------------------- Sale
Route::get('/sales', 'SaleController@index2', function () {
    //whatever
})->middleware('auth')->name('sale');

// --------------------- Stock
Route::get('/stocks', 'StockController@index2', function () {
    //whatever
})->middleware('auth')->name('stock');