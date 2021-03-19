@extends("layouts.app")

@section("title", "Admin | Dashboard")

@section("content")
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-5 offset-1">
            <div class="card w-75 d-block mx-auto py-3 px-1">
                <div class="card-body">
                    <h5 class="text-center w-100">{{$appointments->count()}}</h5>
                    <h5 class="text-center w-100"><a href="{{ route("admin.appointments") }}">@if($appointments->count() >= 2) afspraken @else afspraak @endif</a>deze maand</h5>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card w-75 d-block mx-auto py-3 px-1">
                <div class="card-body">
                    <h5 class="text-center w-100">{{$users->count()}}</h5>
                    <h5 class="text-center w-100"><a href="{{ route("admin.appointments") }}">@if($users->count() >= 2) gebruikers @else gebruiker @endif</a>deze maand</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
