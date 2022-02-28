@extends('../_layouts/navbar')

@section('content')

    <form action="/login" method="POST" class="mt-5">
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <button type="submit" class="btn btn-primary">Login</button>  
        </div>
    </form>

@endsection