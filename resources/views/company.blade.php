@extends('_layouts/navbar')

@section('content')
    
    <div class="container">
        <h1>{{$company->name}}</h1>
        <h2>CEO - {{$company->CEO}}</h2>
        <h4>Telephone - {{$company->telephone}}</h4>
        <h4>Email - {{$company->email}}</h4>
        <h5>Code - {{$company->code}}</h5>
        <h5>PVM Code - {{$company->pvm_code}}</h5>
    </div>

    @if ($update != 0)
        <a href="/api/companies/{{$company->id}}/edit" class="badge badge-info">Update</a>
    @endif

@endsection