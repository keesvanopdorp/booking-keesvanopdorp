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
            ->get();
        $appointments = Appointment::whereBetween("created_at", [$begin->toDateString(), $end->toDateString()])
            ->get();

        return view("admin.index", ["appointments" => $appointments, "users" => $users]);
    }

    public function appointments()
    {
        return view("admin.appointments");
    }

    public function appointment(Appointment $appointment)
    {
        return view("admin.appointments");
    }

}
