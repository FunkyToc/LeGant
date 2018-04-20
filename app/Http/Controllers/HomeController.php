<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\RedGlove;

class HomeController extends Controller
{
    /**
     * Send an email to a random user
     *
     * @return Response
     */
    public function index()
    {
        // Red Pick 
	    $hexaReds = [];
	    $red1 = rand(150, 230);
	    $red2 = rand(1, 20);
	    $redGlove = 'rgb('. $red1 .','. $red2 .','. $red2 .')';

	    // Get Texts 
	    $text = [];
	    $texts['hello'] = DB::select('SELECT id FROM texts WHERE type = "hello" AND active = 1');
	    $texts['text'] = DB::select('SELECT id FROM texts WHERE type = "text" AND active = 1');
	    $texts['bye'] = DB::select('SELECT id FROM texts WHERE type = "bye" AND active = 1');
	    $text['hello'] = DB::select('SELECT * FROM texts WHERE id = :id LIMIT 1', ['id' => $texts['hello'][rand(0, count($texts['hello'])-1)]->id])[0]->text;
	    $text['text'] = DB::select('SELECT * FROM texts WHERE id = :id LIMIT 1', ['id' => $texts['text'][rand(0, count($texts['text'])-1)]->id])[0]->text;
	    $text['bye'] = DB::select('SELECT * FROM texts WHERE id = :id LIMIT 1', ['id' => $texts['bye'][rand(0, count($texts['bye'])-1)]->id])[0]->text;

	    // Get Random User 
	    $users = DB::select('SELECT id FROM users WHERE email != "" AND active = 1');
	    $user = DB::select('SELECT * FROM users WHERE id = :id LIMIT 1', ['id' => $users[rand(0, count($users)-1)]->id])[0];

	    // Update Stats 
	    DB::update('UPDATE users SET targeted = targeted+1 WHERE id = :id', ['id' => $user->id]);

	    // Send Mail 
	    Mail::to($user->email)->send(new RedGlove($text, $redGlove));
	    
	    return view('home', ['bgcolor' => $redGlove]);
    }

}
