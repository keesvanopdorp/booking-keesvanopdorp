@component('mail::message')
	<p>
        Beste meneer of mevrouw {{$appointment->user->name}},<br>
        datum: {{$appointment->date}}
    </p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
