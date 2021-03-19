@extends("layouts.app")

@section("title", "Admin | Afspraken")

@section("content")
<div class="container-fluid">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Reden</th>
                <th>Beschrijving</th>
                <th>datum</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->user->name }}</td>
                    <td>{{ $appointment->reason }}</td>
                    <td>{{ $appointment->description }}</td>
                    <td>{{ date("H:i d-m-Y", strtotime($appointment->date)) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">geen afspraken gevonden</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
