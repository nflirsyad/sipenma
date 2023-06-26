<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function showLogin(){
        //check if user has logged
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('login')->with('error',0);
    }

    public function processLogin(Request $request){
        // if (Auth::guard('petugas')->attempt(['username' => $request->username,'password' => $request->password])) {
        //     return redirect(route('dashboard'));
        // }elseif (Auth::guard('user')->attempt(['username' => $request->username,'password' => $request->password])) {
        //     return redirect(route('dashboard'));
        // }
        if (Auth::guard('petugas')->attempt($request->only('username','password'))) {
            return redirect(route('dashboard'));
        }
        elseif (Auth::guard('mahasiswa')->attempt($request->only('username','password'))) {
            return redirect(route('dashboard'));
        }
        elseif (Auth::guard('web')->attempt($request->only('username','password'))) {
            return redirect(route('dashboard'));
        }
        return redirect(route('login'))->with('error',1);
    }

    public function processLogout(){
        if (Auth::guard('petugas')->check()) {
            Auth::guard('petugas')->logout();
        }elseif (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        }elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        // Auth::logout();
        return redirect('/');
    }
}
