<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Events\AppointmentMade;
use App\Http\Controllers\Controller;

class AdminAppointmentController extends Controller
{
    //
    public function index()
    {
        $now = Carbon::now();
        $begin = Carbon::createFromDate($now->year, $now->month, 1);
        $end = Carbon::createFromDate($now->year, $now->month, 1)->addMonth();
        $appointments = Appointment::with("user")
        ->whereBetween("created_at", [$begin->toDateString(), $end->toDateString()])
        ->orderBy("date", "asc")
        ->get();
        return view("admin.appointments.index", ["appointments" => $appointments]);
    }

    public function create()
    {
        $users = User::role("gebruiker")->get();
        return view("users.appointments.create", ["users" => $users]);
    }

    public function store(Request $request)
    {
        $now = Carbon::now();
        $now->addDays(2);
        $validator = $this->validate($request, [
            "user" => "required|numeric|exists:users,id",
            "reason" => "required|string|max:255",
            "description" => "required|string",
            "date" => "required|date|after:" . $now->format("m-d-Y"),
            "time" => "required|date_format:H:i",
        ]);
        $appointmentDate = sprintf("%s %s", $request->date, $request->time);
        $user = User::find($request->user);
        $appointment = $user->appointments()->create([
            "reason" => $request->reason,
            "description" => $request->description,
            "date" => $appointmentDate,
            "uuid" => Str::uuid(),
        ]);
        AppointmentMade::dispatch($appointment);
        return redirect()->route("admin.index")->with("success", "Afspraak gemaakt voor gebruiker");
    }

    public function view(Appointment $appointment)
    {
        return view("admin.appointments.index");
    }
}
