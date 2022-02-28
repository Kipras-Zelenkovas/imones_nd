<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Views extends Controller
{
    
    public function main(){
        return view('main', ['companies' => []]);
    }

    public function companies(){
        return view('companies');
    }

    public function create(){
        if(Auth::user()){
            return view('createCompany');
        }
        return view('auth/login');
    }
    
    public function register(){
        return view('auth/register');
    }

    public function login(){
        return view('auth/login');
    }

}
