@extends('../_layouts/navbar')

@section('content')

    <form action="/register" method="POST">
        @csrf
        <div class="form-group mt-5">
            <input type="text" name="name" class="form-control" placeholder="Name">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>

    

@endsection