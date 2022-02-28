<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Companies as CompaniesModel;
use Illuminate\Support\Facades\Auth;

class Companies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompaniesModel::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'string|required',
            'code'      => 'alpha_dash|required',
            'pvm_code'  => 'alpha_dash|required',
            'adress'    => 'string|required',
            'telephone' => 'string|required',
            'email'     => 'email:rfc,dns|required',
            'CEO'       => 'string|required' 
        ]);

        $company = new CompaniesModel([
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = CompaniesModel::find($id);
        $update = 0;
        if(Auth::id() == $company->users_id){
            $update = 1;
        }
        
        return view('company', ['company' => $company, 'update' => $update]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = CompaniesModel::find($id);
        return view('companyUpdate', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'string|required',
            'code'      => 'alpha_dash|required',
            'pvm_code'  => 'alpha_dash|required',
            'adress'    => 'string|required',
            'telephone' => 'string|required',
            'email'     => 'string|required',
            'CEO'       => 'string|required' 
        ]);

        $company = CompaniesModel::find($id);

        $company->code      = $request->get('code');
        $company->name      = $request->get('name');
        $company->pvm_code  = $request->get('pvm_code');
        $company->adress    = $request->get('adress');
        $company->telephone = $request->get('telephone');
        $company->email     = $request->get('email');
        $company->CEO       = $request->get('CEO');

        $company->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companie = CompaniesModel::find($id);
        $companie->delete();

        return $companie;
    }
}
