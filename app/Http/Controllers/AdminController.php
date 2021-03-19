<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    //
    public function index()
    {
        $now = Carbon::now();
        $begin = Carbon::createFromDate($now->year, $now->month, 1);
        $end = Carbon::createFromDate($now->year, $now->month, 1)->addMonth();
        $users = User::whereBetween("created_at", [$begin->toDateString(), $end->toDateString()])
            ->withCount('roles')
            ->has('roles', 0)
            ->get();
        $appointments = Appointment::whereBetween("created_at", [$begin->toDateString(), $end->toDateString()])
            ->get();

        return view("admin.index", ["appointments" => $appointments, "users" => $users]);
    }

    public function appointments()
    {
        $now = Carbon::now();
        $begin = Carbon::createFromDate($now->year, $now->month, 1);
        $end = Carbon::createFromDate($now->year, $now->month, 1)->addMonth();
        $appointments = Appointment::with("user")
        ->whereBetween("created_at", [$begin->toDateString(), $end->toDateString()])
        ->orderBy("date", "asc")
        ->get();
        return view("admin.appointments", ["appointments" => $appointments]);
    }

    public function appointment(Appointment $appointment)
    {
        return view("admin.appointments");
    }

}
