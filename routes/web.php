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
Route::any('/admin/users/', 'GoyController@users')->name('admin_manage_users');
Route::any('/admin/texts/', 'GoyController@texts')->name('admin_manage_texts');
Route::any('/admin/login/', 'GoyController@login')->name('admin_login');
Route::any('/admin/logout/', 'GoyController@logout')->name('admin_logout');
Route::any('/admin/active/user/{id}', 'GoyController@activeUser')->where(['id' => '[0-9]+'])->name('admin_active_user');
Route::any('/admin/active/text/{id}', 'GoyController@activeText')->where(['id' => '[0-9]+'])->name('admin_active_text');
Route::any('/admin/delete/user/{id}', 'GoyController@deleteUser')->where(['id' => '[0-9]+'])->name('admin_delete_user');
Route::any('/admin/delete/text/{id}', 'GoyController@deleteText')->where(['id' => '[0-9]+'])->name('admin_delete_text');

// Redirect All Admin Other Routes to the Home Page 
Route::any('/admin/{any}', function ($any) 
{
	return redirect('/admin/');
})->where(['any' => '.*']);

// Redirect All Other Routes to the Home Page 
Route::any('/{any}', function ($any) 
{
	return redirect('/');
})->where(['any' => '.*']);

