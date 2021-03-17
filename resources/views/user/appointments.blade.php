@extends("layouts.app")

@section("title", "inloggen")

@section("content")
<div class="container-fluid">
    <div class="card w-50 mx-auto my-3">
        <div class="card-body">
            <h1 class="text-center w-100">Mijn afspraken</h1>
            @forelse ($appointments as $appointment)
                {{$appointment->date}}
            @empty
                <h5 class="text-center w-100">Je hebt geen openstaande afspraken</h5>
            @endforelse
        </div>
    </div>
</div>
@endsection
