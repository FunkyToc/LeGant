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
    
    // Red Pick 
    $hexaReds = [];
    $red1 = rand(150, 230);
    $red2 = rand(1, 20);
    $redGlove = 'rgb('. $red1 .','. $red2 .','. $red2 .')';

    // Get Emails
    

    // Send Mail

    
    return view('home', ['bgcolor' => $redGlove]);
});
