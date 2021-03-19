<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get("/appointments", [AppointmentController::class, "view"])->name("users.appointments");
    Route::get("/appointments/book", [AppointmentController::class, "index"])->name("appointments.create");
    Route::post("/appointments/book", [AppointmentController::class, "store"]);

    Route::middleware(['role:admin'])->prefix("admin")->name("admin.")->group(function () {
        Route::get('/', [AdminController::class, "index"])->name("index");

        Route::prefix("users")->name("users.")->group(function() {
            Route::get('/', [AdminUserController::class, "index"])->name("index");
            Route::get('/create', [AdminUserController::class, "create"])->name("create");
            Route::post('/create', [AdminUserController::class, "store"])->name("store");
        });

        Route::prefix("appointments")->name("appointments.")->group(function() {
            Route::get('/', [AdminAppointmentController::class, "index"])->name("index");
            Route::get('/book', [AdminAppointmentController::class, "create"])->name("create");
            Route::post('/book', [AdminAppointmentController::class, "store"])->name("store");
            Route::get('/{appointment}', [AdminAppointmentController::class, "view"])->name("view");
            Route::post('/{appointment}/approve', [AdminAppointmentController::class, "appointment"])->name("approve");
        });
    });
    Route::post("/logout", [LoginController::class, "destroy"])->name("auth.logout");
});

Route::prefix("email")->name("verification.")->group(function() {

    Route::get('/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('notice');

    Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/')->with("success", "Email Verified");
    })->middleware(['auth', 'signed'])->name('verify');

    Route::post('/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('send');
});
