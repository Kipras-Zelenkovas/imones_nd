@extends('_layouts/navbar')

@section('content')

    <form action="/api/companies" method="POST">
        @csrf
        <div class="form-group mt-5">
            <input type="text" name="name" class="form-control" placeholder="Name">
            <input type="text" name="code" class="form-control" placeholder="Code">
            <input type="text" name="pvm_code" class="form-control" placeholder="PVM code">
            <input type="text" name="adress" class="form-control" placeholder="Adress">
            <input type="text" name="telephone" class="form-control" placeholder="Telephone">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <input type="text" name="CEO" class="form-control" placeholder="CEO">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>

    
@endsection