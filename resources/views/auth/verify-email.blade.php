@extends('layouts.app')

@section('title', "Verifieer je email")

@section('content')
<div class="container-fluid">
    <div class="card w-25 d-block mx-auto h-25 my-5">
        <div class="card-body">
            <form action="{{route("verification.send") }}" method="post">
                @csrf
                <button type="submit" class="btn btn-success my-2 w-100">Mail opnieuw sturen</button>
            </form>
        </div>
    </div>
</div>
@endsection
