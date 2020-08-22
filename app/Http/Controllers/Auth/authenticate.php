<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class authenticate extends Controller
{
    //

    public function show_login()
    {
        return view('auth.login');
    }

    public function show_register()
    {
        return view('auth.register');
    }

    public function register(Request $request )
    {

        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users|unique:admins',
            'password' => 'required|min:6',
            'retype_password' => 'required|same:password'
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        auth('user')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('user.dashboard');
    }

    public function auth_attempt(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        # Using if else statement, we can determine the type of user logging in
        if (auth('user')->attempt($data)) {
            return redirect()->route('user.dashboard');
        } elseif (auth('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid email and password combination');
        }
    }

    public function logout()
    {
        if (auth('user')->check()) {
            auth('user')->logout();
        } else {
            auth('admin')->logout();
        }
        return redirect()->route('login');
    }

    public function validateAccount()
    {
        if (auth('user')->check()) {
            return redirect()->route('user.dashboard');
        } elseif (auth('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        else {
            return redirect()->route('login')->with('error', 'Login to continue');
        }
    }


}
