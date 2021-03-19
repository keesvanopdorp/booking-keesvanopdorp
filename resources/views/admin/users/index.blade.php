@extends("layouts.app")

@section("title", "Admin | Afspraken")

@section("content")
<div class="container-fluid">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>rollen</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles()->pluck('name')->implode(",") }}</td>
                    <td>
                        <button type="submit"></button>
                        <button type="submit"></button>
                        <button type="submit"></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">geen gebruikers gevonden</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
