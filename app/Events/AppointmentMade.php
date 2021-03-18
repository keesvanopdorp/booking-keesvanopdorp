<?php

namespace App\Events;

use App\Models\Appointment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class AppointmentMade
{
    use SerializesModels,Dispatchable;

    /**
     * @var Appointment
     */
    public $appointment;

    /**
     * Create a new event instance.
     *
     * @param Appointment $appointment
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }
}
