<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companies;

class Search extends Controller
{
    
    public function searchCompanies(Request $request){

        $request->validate([
            'name' => 'string'
        ]);

        $name = $request->get('name');

        $companies = Companies::where('name', 'LIKE', "%$name%")->get();

        return view('/main', ['companies' => $companies]);

    }

}
