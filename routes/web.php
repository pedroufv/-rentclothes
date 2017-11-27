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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/products', 'ProductController');
    Route::resource('/clients', 'ClientController');
    Route::resource('/rents', 'RentController');

    Route::get('/profile', 'Auth\ProfileController@index')->name('profile');
    Route::get('/profile/edit', 'Auth\ProfileController@edit')->name('profile.edit');
    Route::patch('/profile/update', 'Auth\ProfileController@update')->name('profile.update');

    Route::resource('/address_user', 'AddressUserController', ['except' => ['index']]);
    Route::resource('/phone_user', 'PhoneUserController', ['except' => ['index']]);

    Route::get('/clients/{client}/addresses/create', 'AddressClientController@create')->name('address_client.create');
    Route::post('/clients/{client}/addresses/store', 'AddressClientController@store')->name('address_client.store');
    Route::get('/clients/{client}/addresses/{address}', 'AddressClientController@show')->name('address_client.show');
    Route::get('/clients/{client}/addresses/{address}/edit', 'AddressClientController@edit')->name('address_client.edit');
    Route::patch('/clients/{client}/addresses/{address}', 'AddressClientController@update')->name('address_client.update');
    Route::delete('/clients/{client}/addresses/{address}', 'AddressClientController@destroy')->name('address_client.destroy');
});
