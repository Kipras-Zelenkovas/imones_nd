<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuth extends Controller
{

    public function register(Request $request){
        $request->validate([
            'name' => 'alpha|required',
            'email' => 'email:rfc,dns|required',
            'password' => 'alpha_num|required'
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect('/login');

    }
    
    public function login(Request $request){
        $request->validate([
            'email'    => 'email:rfc,dns|required',
            'password' => 'alpha_dash|required'
        ]);

        if(Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
            $request->session()->regenerate();

            return redirect('/');
        }

        return redirect()->back()->withErrors('Wrong email or password');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
