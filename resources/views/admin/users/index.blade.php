@extends("layouts.app")

@section("title", "Admin | Afspraken")

@section("content")
<div class="container-fluid">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>rol</th>
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
                        <a href="" class="bnt text-decoration-none btn-danger text-center py-1 px-2 rounded mx-1" data-bs-toggle="tooltip" data-bs-placement="buttom" title="gebruiker te verwijderen">
                            <i class="fas fa-trash"></i>
                        </a>
                        <a href="" class="bnt btn-primary text-decoration-none text-center py-1 px-2 rounded mx-1" data-bs-toggle="tooltip" data-bs-placement="buttom" title="gebruiker te bewerken">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="" class="bnt btn-danger text-decoration-none text-center py-1 px-2 rounded mx-1" data-bs-toggle="tooltip" data-bs-placement="buttom" title="gebruiker tijdelijk toegang te ontzeggen">
                            <i class="fas fa-user-slash"></i>
                        </a>
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
