<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    //
    public function index()
    {
        return view("appointment.index");
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function view(Request $request)
    {
        $now = Carbon::now();
        $appointments = $request->user()->appointments()->where("created_at", ">=", $now->toDateTimeString())->get();
        return view("user.appointments", ["appointments" => $appointments]);
    }
}
