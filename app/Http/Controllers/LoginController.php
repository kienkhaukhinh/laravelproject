<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
     public function getLogin () {
        if (!Auth::check()) {
            return view('admin.login');
        } else {
            return redirect('qho_admin');
        }
    }

    public function postLogin (LoginRequest $request) {
    	$login = [
    		'username' => $request->txtUser, 
    		'password' => $request->txtPass, 
    		'level' => 1
    	];
    	if (Auth::attempt($login)) {
            return redirect('qho_admin');
        } else {
        	return redirect()->back();
        }
    }

    public function getLogout () {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
