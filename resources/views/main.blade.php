@extends('_layouts/navbar')

@section('content')

    <form action="/api/searchCompany" method="GET">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control mt-5" placeholder="Company">
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>

    @foreach($companies as $item)
        <div class="container mt-5">
            <a href="/api/companies/{{$item->id}}">
                <h2>{{$item->name}}</h2>
                <h3>{{$item->adress}}</h3>
                <h3>{{$item->email}}</h3>
            </a>
        </div>
    @endforeach

@endsection