@extends("layouts.app")

@section("title", "inloggen")

@section("content")
<div class="container-fluid">
    <div class="card w-25 d-block mx-auto h-25 my-5">
        <div class="card-body">
            <form action="{{route("auth.login.store") }}" method="post">
                @csrf
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <label for="email">wachtwoord</label>
                <input type="password" name="password" id="password" class="form-control">
                <button type="submit" class="btn btn-success my-2 w-100">Inloggen</button>
            </form>
        </div>
    </div>
</div>
@endsection
