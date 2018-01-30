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




Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/prenumerata', 'SubsriptionController@index')->name('subscription');
Route::post('/prenumerata/store', 'SubsriptionController@store')->name('form.save');


Route::group(['middleware'=> ['auth'], 'prefix'=>'admin'], function (){
    Route::get('/userlist', 'AdminController@index')->name('admin.index');
    Route::get('subscription', 'AdminController@subscription')->name('admin.subscription');
    Route::get('/userlist/{name}','AdminController@sortByName')->name('sortByName');
    Route::get('/user/{id}', 'AdminController@edit')->name('edit.user');
    Route::get('subscription/add','AdminController@addSubscription')->name('add.subscription');
    Route::post('subscription/store', 'AdminController@storeSubscription')->name('store.subscription');
    Route::delete('subscription/{id}', 'AdminController@deleteSubscription')->name('delete.subscription');
    Route::put('/user/{id}/update', 'AdminController@update')->name('update.user');
    Route::delete('/user/{id}/delete', 'AdminController@delete')->name('delete.user');

});
