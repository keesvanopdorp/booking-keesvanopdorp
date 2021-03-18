@component('mail::message')
	<p>
        Beste meneer of mevrouw {{$appointment->user->name}},<br>
        bedankt voor het boeken van een afspraak met Kees van Opdorp. <br>
        Hieronder vindt u de details: <br>
        datum: {{ $appointment->date }} <br>
        reden: {{ $appointment->reason }} <br>
        beschrijving: {{ $appointment->description }} <br>
    </p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
