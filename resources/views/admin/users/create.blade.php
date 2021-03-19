@extends("layouts.app")

@section("title", "Admin | Afspraken")

@section("content")
<div class="container-fluid">
    <div class="card w-25 d-block mx-auto h-25 my-5">
        <div class="card-body">
            <h3 class="w-100 text-center">Gebruiker maken</h3>
            <form action="{{ route("admin.users.store") }}" method="post">
                @csrf
                <label for="name">{{__("validation.attributes.name")}}</label>
                <input class="form-control" type="text" name="name" id="name">
                @error("naam")
                    <p class="text-danger">{{ __($message) }}</p>
                @enderror

                <label for="email">{{__("validation.attributes.email")}}</label>
                <input class="form-control" type="email" name="email" id="email">
                @error("email")
                    <p class="text-danger">{{ __($message) }}</p>
                @enderror

                <label for="password">{{ __("validation.attributes.password") }}</label>
                <input class="form-control" type="password" name="password" id="password" autocomplete="new-password">
                @error("password")
                    <p class="text-danger">{{ __($message) }}</p>
                @enderror

                <label for="password_confirmation"> {{__("validation.attributes.password_confirmation")}} </label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password">
                @error("password_confirmation")
                    <p class="text-danger">{{ __($message) }}</p>
                @enderror

                <label for="role">{{ __("validation.attributes.role") }}</label>
                <select class="form-select" name="role" id="role">
                    <option disabled {{ (old("role") ?? "selected" ?? "" )}} >Selecteer een optie</option>
                    {{ old("role") }}
                    @foreach ($roles as $role)

                        <option value="{{$role->id}}" {{ (old("role") == $role->id ? "selected":"") }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @error("role")
                    <p class="text-danger">{{ __($message) }}</p>
                @enderror

                <button class="btn btn-success my-3 btn-block w-100">Gebruiker aanmaken</button>
            </form>
        </div>
    </div>
</div>
@endsection
