@extends("layouts.app")

@section("title", "Admin | Afspraken")

@section("content")
<div class="container-fluid">
    <div class="card w-25 d-block mx-auto h-25 my-5">
        <div class="card-body">
            <h3 class="w-100 text-center">Afspraak maken</h3>
            <form action="{{route((Request::url() === route("admin.appointments.create")) ? "admin.appointments.create" :"appointments.create") }}" method="post">
                @csrf
                @if(Request::url() === route("admin.appointments.create"))
                    <label for="user">Gebruiker</label>
                    <select class="form-control" name="user" id="user">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <a href="{{ route("admin.users.create") }}" class="d-block text-decoration-none">nieuwe gebruiker aanmaken</a>
                @endif
                <label for="reason">Reden</label>
                <input type="text" name="reason" id="reason" class="form-control">
                @error("reason")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="description">Beschrijving</label>
                <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                @error("description")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="time">Datum</label>
                <input type="date" name="date" id="date" class="form-control">
                @error("date")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="time">Tijd</label>
                <input type="time" name="time" id="time" class="form-control">
                @error("time")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-primary my-2 w-100">Afspraak boeken</button>
            </form>
        </div>
    </div>
</div>
@endsection
