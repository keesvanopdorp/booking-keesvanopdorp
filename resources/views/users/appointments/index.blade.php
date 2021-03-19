@extends("layouts.app")

@section("title", "Mijn afspraken")

@section("content")
<div class="container-fluid">
    <div class="card w-50 mx-auto my-3">
        <div class="card-body">
            <h1 class="text-center w-100">Mijn afspraken</h1>
            <div class="row">
                @forelse ($appointments as $appointment)
                    <p class="col-2">reden: {{$appointment->reason}}</p>
                    <p class="col-4">datum: {{$appointment->date}}</p>
                    <p class="col-6">beschrijving: {{$appointment->description}}</p>
                @empty
                <h5 class="text-center w-100">Je hebt geen openstaande afspraken</h5>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
