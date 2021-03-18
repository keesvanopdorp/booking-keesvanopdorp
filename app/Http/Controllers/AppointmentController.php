<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    //
    public function index()
    {
        return view("appointment.index");
    }

    public function store(Request $request)
    {
        $now = Carbon::now();
        $now->addDays(2);
        $validator = $this->validate($request, [
            "reason" => "required|string|max:255",
            "description" => "required|string",
            "date" => "required|date|after:" . $now->format("m-d-Y"),
            "time" => "required|date_format:H:i",
        ]);
        $appointmentDate = sprintf("%s %s", $request->date, $request->time);
        $request->user()->appointments()->create([
            "reason" => $request->reason,
            "description" => $request->description,
            "date" => $appointmentDate,
            "uuid" => Str::uuid(),
        ]);
        return redirect()->route("user.appointments")->with("success", "Afspraak gemaakt");
    }

    public function view(Request $request)
    {
        $now = Carbon::now();
        $appointments = $request->user()->appointments()->where("date", ">=", $now->toDateTimeString())->get();
        return view("user.appointments", ["appointments" => $appointments]);
    }
}
