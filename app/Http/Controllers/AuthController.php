<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auths.login');
    }

    public function postlogin(Request $req)
    {
    	if(Auth::attempt($req->only('email','password')))
    	{
                return redirect ('/');        
    	}

    	return redirect('/logins');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/logins');
    }

    public function register()
    {
    	return view('auths.register');
    }

    public function postregister(Request $req)
    {
    	$user = new \App\User;
        $user->role ='admin';
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->remember_token = Str::random(60);
        $user->save();

        return redirect('/logins');
    }
}
