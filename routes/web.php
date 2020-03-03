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
    return view('auth.login');
});

Auth::routes();

//  Clientes
Route::get('/home', 'HomeController@index')->name('home');


//  Contadores
Route::get('/accountant', 'HomeController@viewAccountant')->name('accountant');
Route::get('/accountant/client/{id}', 'HomeController@showClient')->name('reports.show');


//  administrador
Route::resource('admin', 'AdminController');

// PDF

Route::get('/pdf', 'HomeController@pdf')->name('generate.pdf');

Route::post('uploadPDF', 'HomeController@uploadPDF')->name('uploadPDF');


// SMS

Route::post('sendSMS', 'HomeController@sendSMS')->name('send');
