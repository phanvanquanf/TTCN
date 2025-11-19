<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\PatientController as AdminPatientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\AppointmentController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ServicesController;
use App\Http\Controllers\Client\DepartmentController;
use App\Http\Controllers\Client\StaffController;
use App\Http\Controllers\Client\PatientController;
use Illuminate\Support\Facades\Route;

// Login, Register
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'postRegister')->name('postRegister');

    Route::get('/',  'login')->name('login');
    Route::post('/login', 'postLogin')->name('postLogin');

    Route::post('/logout', 'logout')->name('logout');
});


Route::prefix('client')->group(function () {
    Route::get('/home/index', [HomeController::class, 'index'])->name('home');
    Route::get('/home/about', [HomeController::class, 'about']);
    Route::get('/home/contact', [HomeController::class, 'contact']);
});


// Services
Route::controller(ServicesController::class)->group(function () {
    Route::get('/service/index', 'index');
});

// Departments
Route::controller(DepartmentController::class)->group(function () {
    Route::get('/departments/index', 'gallery');
});

// Staff
Route::controller(StaffController::class)->group(function () {
    Route::get('/staff/index', action: 'index');
});

// Patient
Route::controller(PatientController::class)->group(function () {
    Route::get('client/patients/profile/{id}', action: 'profile')->name('patient.profile');
    Route::put('client/patients/update/{id}', action: 'update')->name('patient.update');
});


// Apointment
Route::controller(AppointmentController::class)->group(function () {
    Route::get('/appointment/index', 'index')->name('appointments.index');
    Route::post('/appointment/store', 'store')->name('appointments.store');
    Route::get('/appointment/history', 'history')->name('appointments.history');
    Route::post('/appointment/cancel/{id}', 'history')->name('appointments.cancel');
});



//Admin
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\StaffController as AdminStaffController;

Route::controller(AdminHomeController::class)->middleware(['auth:web', 'check.role'])->group(function () {
    Route::get('/admin/index', 'index')->name('admin.home');
});

//AccountController

Route::prefix('admin/accounts')->middleware(['auth:web', 'check.role'])->group(function () {
    Route::get('/index', [AccountController::class, 'index'])->name('accounts.index');

    Route::get('/details', [AccountController::class, 'details'])->name('details');

    Route::get('/create', [AccountController::class, 'create'])->name('accounts.create');
    Route::post('/store', [AccountController::class, 'store'])->name('accounts.store');


    Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('accounts.edit');
    Route::put('/update/{id}',  [AccountController::class, 'update'])->name('accounts.update');

    Route::post('/delete/{id}', [AccountController::class, 'destroy'])->name('accounts.destroy');
});

//StaffController
Route::prefix('admin/staff')->middleware(['auth:web', 'check.role'])->group(function () {
    Route::get('/index', [AdminStaffController::class, 'index'])->name('staff.index');

    Route::get('/show/{id}', [AdminStaffController::class, 'show'])->name('staff.show');

    Route::get('/create', [AdminStaffController::class, 'create'])->name('staff.create');
    Route::post('/store', [AdminStaffController::class, 'store'])->name('staff.store');


    Route::get('/edit/{id}', [AdminStaffController::class, 'edit'])->name('staff.edit');
    Route::put('/update/{id}',  [AdminStaffController::class, 'update'])->name('staff.update');

    Route::post('/delete/{id}', [AdminStaffController::class, 'destroy'])->name('staff.destroy');
});

//StaffController
Route::prefix('admin/patients')->middleware(['auth:web', 'check.role'])->group(function () {
    Route::get('/index', [AdminPatientController::class, 'index'])->name('patients.index');
    Route::get('/show/{id}', [AdminPatientController::class, 'show'])->name('patients.show');

    Route::get('/details', [AdminPatientController::class, 'details'])->name('patients.details');

    Route::get('/create', [AdminPatientController::class, 'create'])->name('patients.create');
    Route::post('/store', [AdminPatientController::class, 'store'])->name('patients.store');


    Route::get('/edit/{id}', [AdminPatientController::class, 'edit'])->name('patients.edit');
    Route::put('/update/{id}',  [AdminPatientController::class, 'update'])->name('patients.update');

    Route::post('/delete/{id}', [AdminPatientController::class, 'destroy'])->name('patients.destroy');
});


//AppointmentController
Route::prefix('admin/appointment')->middleware(['auth:web', 'check.role'])->group(function () {
    Route::get('/index', [AdminAppointmentController::class, 'index'])->name('appointments.admin');
    Route::get('/show/{id}', [AdminAppointmentController::class, 'show'])->name('appointments.show');
    Route::put('/updateStatus/{id}', [AdminAppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
});
