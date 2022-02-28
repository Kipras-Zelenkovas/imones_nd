@extends('_layouts/navbar')

@section('content')

<form action="/api/companies/{{$company->id}}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group mt-5">
        <input type="text" name="name" class="form-control" placeholder="{{$company->name}}">
        <input type="text" name="code" class="form-control" placeholder="{{$company->code}}">
        <input type="text" name="pvm_code" class="form-control" placeholder="{{$company->pvm_code}}">
        <input type="text" name="adress" class="form-control" placeholder="{{$company->adress}}">
        <input type="text" name="telephone" class="form-control" placeholder="{{$company->telephone}}">
        <input type="email" name="email" class="form-control" placeholder="{{$company->email}}">
        <input type="text" name="CEO" class="form-control" placeholder="{{$company->CEO}}">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
    
@endsection