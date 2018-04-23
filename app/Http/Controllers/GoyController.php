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

	    // Get User List + count 
        $users = DB::select('SELECT * FROM users ORDER BY id DESC LIMIT 10');
        $mailCount = DB::select('SELECT SUM(targeted) as mails FROM users')[0]->mails;
        $rageCount = DB::select('SELECT SUM(rage) as rages FROM users')[0]->rages;

	    // Get Text List + count 
        $texts = DB::select('SELECT * FROM texts ORDER BY id DESC LIMIT 10');
	    
	    return view('admin.home', [
            'mailCount' => $mailCount,
            'rageCount' => $rageCount,
            'users' => $users,
            'texts' => $texts
        ]);
    }

    /**
     * List users & texts
     *
     * @return Response
     */
    public function users(Request $request)
    {
        // Check session 
        if (!$request->session()->has('goy')) {
            return redirect()->route('admin_login');
        }

        // 

        // Get User List 
        $users = DB::select('SELECT * FROM users WHERE email != "" ORDER BY id DESC');
        
        return view('admin.users', [
            'request' => $request,
            'users' => $users
        ]);
    }

    /**
     * List users & texts
     *
     * @return Response
     */
    public function texts(Request $request)
    {
        // Check session 
        if (!$request->session()->has('goy')) {
            return redirect()->route('admin_login');
        }

        // Get Text List 
        $texts['hello'] = DB::select('SELECT * FROM texts WHERE type = "hello" ORDER BY id DESC');
        $texts['text'] = DB::select('SELECT * FROM texts WHERE type = "text" ORDER BY id DESC');
        $texts['bye'] = DB::select('SELECT * FROM texts WHERE type = "bye" ORDER BY id DESC');
        
        return view('admin.texts', [
            'request' => $request,
            'texts' => $texts
        ]);
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
