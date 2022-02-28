<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Create extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name'      => 'string|required',
            'code'      => 'alpha_dash|required',
            'pvm_code'  => 'alpha_dash|required',
            'adress'    => 'string|required',
            'telephone' => 'alpha_dash|required',
            'email'     => 'email:rfc,dns|required',
            'CEO'       => 'string|required' 
        ]);

        $company = new Companies([
            'name'      => $request->get('name'),
            'code'      => $request->get('code'),
            'pvm_code'  => $request->get('pvm_code'),
            'adress'    => $request->get('adress'),
            'telephone' => $request->get('telephone'),
            'email'     => $request->get('email'),
            'CEO'       => $request->get('CEO'),
            'users_id'  => Auth::id(),
        ]);

        $company->save();

        return redirect('/');
    }
}
