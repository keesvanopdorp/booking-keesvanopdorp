<?php

namespace App\Listeners;

use App\Events\AppointmentMade;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmation;

class SendAppointmentEmailConfirmation
{
    /**
     * Handle the event.
     *
     * @param  AppointmentMade  $event
     * @return void
     */
    public function handle(AppointmentMade $event)
    {
        if($event->appointment->confirmation_send === NULL) {
            Mail::to($event->appointment->user)
            ->bcc(env("ADMIN_EMAIL"))
            ->send(new AppointmentConfirmation($event->appointment));
        }
    }
}
