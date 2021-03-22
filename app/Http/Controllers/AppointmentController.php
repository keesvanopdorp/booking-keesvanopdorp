<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Events\AppointmentMade;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    //
    public function index()
    {
        return view("users.appointments.create");
    }

    public function store(Request $request)
    {
        $now = Carbon::now();
        $now->addDays(2);
        $validator = $this->validate($request, [
            "reason" => "required|string|max:255",
            "description" => "required|string",
            "date" => "required|date|after:" . $now->format("Y-m-d"),
            "time" => "required|date_format:H:i",
        ]);
        $appointmentDate = sprintf("%s %s", $request->date, $request->time);
        $appointment = $request->user()->appointments()->create([
            "reason" => $request->reason,
            "description" => $request->description,
            "date" => $appointmentDate,
            "uuid" => Str::uuid(),
        ]);
        AppointmentMade::dispatch($appointment);
        return redirect()->route("users.appointments")->with("success", "Afspraak gemaakt");
    }

    public function view(Request $request)
    {
        $now = Carbon::now();
        $appointments = $request->user()->appointments()->where("date", ">=", $now->toDateTimeString())->get();
        return view("users.appointments.index", ["appointments" => $appointments]);
    }
}
