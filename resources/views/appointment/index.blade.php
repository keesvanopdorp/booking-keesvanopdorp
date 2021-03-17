@extends("layouts.app")

@section("title", "Admin | Afspraken")

@section("content")
<div class="container-fluid">
    <div class="card w-25 d-block mx-auto h-25 my-5">
        <div class="card-body">
            <h3 class="w-100 text-center">Afspraak maken</h3>
            <form action="{{route("appointment.book") }}" method="post">
                @csrf
                <label for="reason">Reden</label>
                <input type="text" name="reason" id="reason" class="form-control">
                @error("reason")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="deescription">Beschrijving</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                <label for="time">Datum</label>
                <input type="date" name="date" id="date" class="form-control">
                <label for="time">Tijd</label>
                <input type="time" name="time" id="time" class="form-control">
                <button type="submit" class="btn btn-primary my-2 w-100">Afspraak boeken</button>
            </form>
        </div>
    </div>
</div>
@endsection
