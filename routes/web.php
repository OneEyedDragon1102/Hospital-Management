<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Mail\MyTestMail;
use App\Http\Controllers\MailController;
use App\Http\Controllers\DoctorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect']);
Route::get('logout', [HomeController::class, 'logout']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/doctors_view', [AdminController::class, 'doctors_table']);
Route::get('/add_doctors_view', [AdminController::class, 'add_view']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::get('/delete_doctor/{id}', [AdminController::class, 'delete_doctor']);
Route::get('/update_doctor/{id}', [AdminController::class, 'update_doctor']);
Route::post('/edit_doctor/{id}', [AdminController::class, 'edit_doctor']);

Route::post('/appointment', [HomeController::class, 'make_appointment']);
Route::get('/my_appointment', [HomeController::class, 'appointment_view']);
Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment']);
Route::get('/appointment_view', [AdminController::class, 'appointment_view']);
Route::get('/approve_appointment/{id}', [AdminController::class, 'approve_appointment']);
Route::get('/cancel_appointment/{id}', [AdminController::class, 'cancel_appointment']);

Route::get('/view_email/{id}', [AdminController::class, 'email_view']);
Route::post('/send_mail', [MailController::class, 'send_mail']);

Route::get('/doctor_appointments_view', [DoctorController::class, 'appointment_view']);
