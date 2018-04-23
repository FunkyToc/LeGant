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

        // New user
        if ($request->input('email')) {
            
            $validation = $request->validate([
                'email' => 'required|email|unique:users,email|max:255'
            ]);

            DB::insert('INSERT INTO users (email, active, created_at, updated_at) VALUES (:email, 1, NOW(), NOW())', ['email' => $validation['email']]);
        }

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

        // New user
        if ($request->input('type') && $request->input('text')) {
            
            $validation = $request->validate([
                'type' => 'required|max:255',
                'text' => 'required|max:255|unique:texts,text'
            ]);

            DB::insert('INSERT INTO texts (type, text, active, created_at, updated_at) VALUES (:type, :text, 1, NOW(), NOW())', ['type' => $validation['type'], 'text' => $validation['text']]);
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
     * Active / unactive a user
     *
     * @return Response
     */
    public function activeUser(Request $request, int $id)
    {
        // Check session 
        if (!$request->session()->has('goy')) {
            return redirect()->route('admin_login');
        }

        // Delete user
        $user = DB::select('SELECT id, active FROM users WHERE id = :id', ['id' => $id])[0];

        if ($user->id) {
            $reverse = $user->active ? 0 : 1;
            DB::update('UPDATE users SET active = :reverse WHERE id = :id', ['reverse' => $reverse, 'id' => $id]);
        }

	    return redirect()->back();
    }

    /**
     * Delete a text
     *
     * @return Response
     */
    public function activeText(Request $request, int $id)
    {
        // Check session 
        if (!$request->session()->has('goy')) {
            return redirect()->route('admin_login');
        }

        // Delete text 
        $text = DB::select('SELECT id, active FROM texts WHERE id = :id', ['id' => $id])[0];

        if ($text->id) {
            $reverse = $text->active ? 0 : 1;
            DB::update('UPDATE texts SET active = :reverse WHERE id = :id', ['reverse' => $reverse, 'id' => $id]);
        }

	    return redirect()->back();
    }

}
