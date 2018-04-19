<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
	    $text['hello'] = 'Hello';
	    $text['text'] = 'Chauffe ton chakra pti mec bien auch.';
	    $text['bye'] = 'A plus beaugosse !';

	    // Get Emails
	    $emails = ['theamazingredglove@gmail.com'];
	    $email = $emails[rand(0, count($emails)-1)];

	    // Send Mail
	    Mail::to($email)->send(new RedGlove($text, $redGlove));
	    
	    return view('home', ['bgcolor' => $redGlove]);

    }

}
