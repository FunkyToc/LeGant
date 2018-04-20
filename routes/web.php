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

// Public Pages 
Route::any('/', 'HomeController@index')->name('redglove');

// Admin Pages 
Route::any('/admin/', 'GoyController@index')->name('admin_home');
Route::any('/admin/login/', 'GoyController@login')->name('admin_login');
Route::post('/admin/add/user/', 'GoyController@addUser')->name('admin_add_user');
Route::post('/admin/del/user/{id}', 'GoyController@delUser')->where('id', '[0-9]+')->name('admin_del_user');
Route::post('/admin/add/text/', 'GoyController@addText')->name('admin_add_text');
Route::post('/admin/del/text/{id}', 'GoyController@delText')->where('id', '[0-9]+')->name('admin_del_text');

// Redirect All Other Routes to the Home Page 
Route::any('/{any}', function ($any) 
{
    
	return redirect('/');
})->where('any', '.*');

