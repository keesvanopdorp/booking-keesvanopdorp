<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('index');
})->name("home");

Route::middleware(['guest'])->group(function () {
    Route::get("/login", [LoginController::class, "index"])->name("auth.login");
    Route::post("/login", [LoginController::class, "store"]);
    Route::get("/register", [RegisterController::class, "index"])->name("auth.register");
    Route::post("/register", [RegisterController::class, "store"]);
});

Route::middleware(['auth'])->group(function () {
    Route::get("/appointment/book", [AppointmentController::class, "index"])->name("appointment.book");
    Route::get("/appointments", [AppointmentController::class, "view"])->name("user.appointments");
    Route::post("/appointment/book", [AppointmentController::class, "store"]);
    Route::middleware(['role:admin'])->prefix("admin")->group(function () {
        Route::get('/', [AdminController::class, "index"])->name("admin");
        Route::get('/appointments', [AdminController::class, "appointments"])->name("admin.appointments");
        Route::get('/users', [AdminController::class, "appointments"])->name("admin.users");
        Route::get('/appointments{appointment}', [[AdminController::class, "appointment"]])->name("admin.appointment");
        Route::post('/appointments{appointment}/approve', [[AdminController::class, "appointment"]])->name("admin.appointment");
    });
    Route::post("/logout", [LoginController::class, "destroy"])->name("auth.logout");
});
