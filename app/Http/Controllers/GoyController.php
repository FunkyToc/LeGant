<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GoyController extends Controller
{
    /**
     * Log as Admin
     *
     * @return Response
     */
    public function login()
    {
        // Check admin 

	    	// Login

    		// Redirect 

	    return view('admin/login', ['request' => $request]);
    }

    /**
     * List users & texts
     *
     * @return Response
     */
    public function index()
    {
        // Check submit 

	    	// Add email

	    	// Add text 

	    // Get Email List 

	    // Get User List 
	    
	    return view('admin/home', ['request' => $request]);
    }

    /**
     * Add a user
     *
     * @return Response
     */
    public function addUser()
    {
        // Check email exists

        // Insert user 

	    return redirect()->route('admin_home');
    }

    /**
     * Delete a user
     *
     * @return Response
     */
    public function DelUser($id)
    {
        // Delete user

	    return redirect()->route('admin_home');
    }

    /**
     * Add a text
     *
     * @return Response
     */
    public function addText()
    {
        // Add new text 

	    return redirect()->route('admin_home');
    }

    /**
     * Delete a text
     *
     * @return Response
     */
    public function DelText($id)
    {
        // Delete text 

	    return redirect()->route('admin_home');
    }

}
