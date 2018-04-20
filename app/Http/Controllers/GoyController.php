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
    public function login(Request $request)
    {
        // Check session 
        if ($request->session()->has('goy')) {
            return redirect()->route('admin_home');
        }

        // Allowed admins 
        $admins = [
            'GoyAdmin1' => 'GoyPass1',
            'GoyAdmin2' => 'GoyPass2'
        ];

        $login = '';
        $pass = '';

        if ($request->input('login') && $request->input('pass')) {
            
            $login = $request->input('login');
            $pass = $request->input('pass');

            // Check admin 
            if (!empty($admins[$login]) && $admins[$login] === $pass) {
                
                // Set session
                $request->session()->put('goy', 'ImGoy');

                // Redirect 
                return redirect()->route('admin_home');
            }
        }

	    return view('admin.login', ['login' => $login, 'pass' => $pass]);
    }

    /**
     * Logout
     *
     * @return Response
     */
    public function logout(Request $request)
    {
        // Destroy session
        $request->session()->flush();

        // Redirect 
        return redirect()->route('admin_login');
    }

    /**
     * List users & texts
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // Check session 
        if (!$request->session()->has('goy')) {
            return redirect()->route('admin_login');
        }
        
        // Check submit 

	    	// Add email

	    	// Add text 

	    // Get Email List 

	    // Get User List 
	    
	    return view('admin.home', ['request' => $request]);
    }

    /**
     * Add a user
     *
     * @return Response
     */
    public function addUser()
    {
        // Check session 
        if (!$request->session()->has('goy')) {
            return redirect()->route('admin_login');
        }

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
        // Check session 
        if (!$request->session()->has('goy')) {
            return redirect()->route('admin_login');
        }

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
        // Check session 
        if (!$request->session()->has('goy')) {
            return redirect()->route('admin_login');
        }

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
        // Check session 
        if (!$request->session()->has('goy')) {
            return redirect()->route('admin_login');
        }

        // Delete text 

	    return redirect()->route('admin_home');
    }

}
