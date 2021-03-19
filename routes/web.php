<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminAppointmentController;

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
    Route::get("/appointments", [AppointmentController::class, "view"])->name("users.appointments");
    Route::get("/appointment/book", [AppointmentController::class, "index"])->name("appointments.create");
    Route::post("/appointment/book", [AppointmentController::class, "store"]);

    Route::middleware(['role:admin'])->prefix("admin")->group(function () {

        Route::get('/', [AdminController::class, "index"])->name("admin");

        Route::prefix("/users")->group(function() {
            Route::get('/', [AdminUserController::class, "index"])->name("admin.users");
            Route::get('/create', [AdminUserController::class, "create"])->name("admin.users.create");
            Route::post('/create', [AdminUserController::class, "store"]);
        });

        Route::prefix("/appointments")->group(function() {
            Route::get('/', [AdminAppointmentController::class, "index"])->name("admin.appointments");
            Route::get('/{appointment}', [AdminAppointmentController::class, "view"])->name("admin.appointments.view");
            Route::post('/{appointment}/approve', [AdminAppointmentController::class, "appointment"])->name("admin.appointment");
            Route::get('/book', [AdminAppointmentController::class, "create"])->name("admin.appointments.create");
            Route::post('/book', [AdminAppointmentController::class, "store"]);
        });
    });
    Route::post("/logout", [LoginController::class, "destroy"])->name("auth.logout");
});
