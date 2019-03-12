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

//Route::group(array('prefix' => '/'), function()
//{
//
//    Route::get('/', function () {
//        return view('welcome');
//    });
//
//    Auth::routes();
//
//    Route::get('/home', 'HomeController@index')->name('home');
//
//});

Auth::routes();

// wituout login landing page
//Route::get('/', function () {
//    return view('welcome');
//})->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/roles', 'Admin\RoleController@index')->name('Roles');
    Route::get('/roles/delete/{id}', 'Admin\RoleController@delete')->name('Roles');
    Route::get('/roles/create', 'Admin\RoleController@create')->name('create');
    Route::post('/roles/save', 'Admin\RoleController@save')->name('save');
    Route::get('/roles/edit/{id}', 'Admin\RoleController@edit')->name('edit');
    Route::post('/roles/update', 'Admin\RoleController@update')->name('update');

//    ------------------------ Menu ---------------

    Route::resource('menu', 'Admin\MenuController');
});

//Route::get('/', function () {
//    return view('welcome');
//});





