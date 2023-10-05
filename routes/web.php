<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\MailController;
use \App\Http\Controllers\ScheduleController;
use \App\Http\Controllers\AppointmentController;
use \App\Http\Controllers\FileController;
use \App\Http\Controllers\TreatmentController;
use \App\Http\Controllers\DiagnoseController;
use \App\Http\Controllers\BlogController;
use \App\Http\Controllers\AdviceController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;

Route::get('/login' , [LoginController::class , 'showLoginForm'])->name('login');
Route::get('/register-as-doctor' , [RegisterController::class , 'showRegistrationForm'])->name('registerDoctor');
Route::get('/register-as-patient' , [RegisterController::class , 'showRegistrationForm'])->name('registerPatient');

Route::post('/register-as-doctor' , [RegisterController::class , 'register'])->name('storeDoctor');
Route::post('/register-as-patient' , [RegisterController::class , 'register'])->name('storePatient');
Route::post('/login' , [LoginController::class , 'login'])->name('login');
Route::post('/logout' , [LoginController::class , 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function (){
        if (auth()->user()->hasRole('Admin')) return redirect(route('viewRequests'));
        if (auth()->user()->hasRole(['Doctor' , 'Patient'])) return redirect(route('category.index'));
    })->name('dashboard');

    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/requests', [UserController::class, 'viewRequests'])->name('viewRequests');
    Route::get('/user/requests/{request}', [UserController::class, 'viewRequest'])->name('registration.view');
    Route::get('/user/archived-requests', [UserController::class, 'viewRequestsArchive']);
    Route::get('/category' , [CategoryController::class , 'index'])->name('category.index');
    Route::get('/category/create' , [CategoryController::class , 'create']);
    Route::get('/category/{category}/edit' , [CategoryController::class , 'edit'])->name('category.edit');
    Route::get('/category/{category}/doctors', [CategoryController::class, 'doctors'])->name('category.doctors');
    Route::get('/user/{user}/editCategory', [UserController::class, 'editCategory'])->name('user.editCategory');

    Route::get('/doctors', [UserController::class, 'indexDoctors'])->name('doctor.index');
    Route::get('/patients', [UserController::class, 'indexPatients']);
    Route::get('/schedule/create', [ScheduleController::class, 'create']);
    Route::get('/appointment/create', [AppointmentController::class, 'create']);
    Route::get('/appointment/archive', [AppointmentController::class, 'archive']);
    Route::get('/doctor/schedules', [ScheduleController::class, 'doctorSchedules']);
    Route::get('/file/create', [FileController::class, 'create']);
    Route::get('/treatment/create', [TreatmentController::class, 'create']);
    Route::get('/diagnose/create', [DiagnoseController::class, 'create']);
    Route::get('/advice/create', [AdviceController::class, 'create']);

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::get('/blog/{blog}', [BlogController::class, 'view'])->name('blog.view');
    Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');

    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/schedule/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointment/requests', [AppointmentController::class, 'requestAppointment'])->name('appointment.request');
    Route::get('/treatment', [TreatmentController::class, 'index'])->name('treatment.index');
    Route::get('/treatment/{treatment}/edit', [TreatmentController::class, 'edit'])->name('treatment.edit');
    Route::get('/diagnose', [DiagnoseController::class, 'index'])->name('diagnose.index');
    Route::get('/diagnose/{diagnose}/edit', [DiagnoseController::class, 'edit'])->name('diagnose.edit');
    Route::get('/advice', [AdviceController::class, 'index'])->name('advice.index');
    Route::get('/advice/{advice}/edit', [AdviceController::class, 'edit'])->name('advice.edit');

    Route::post('/user/request/{registration}/register', [UserController::class, 'register']);
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::post('/file', [FileController::class, 'store'])->name('file.store');
    Route::post('/treatment', [TreatmentController::class, 'store'])->name('treatment.store');
    Route::post('/diagnose', [DiagnoseController::class, 'store'])->name('diagnose.store');
    Route::post('/advice', [AdviceController::class, 'store'])->name('advice.store');
    Route::post('/send-mail' , [MailController::class , 'sendMail']);

    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::put('/user/{user}/changeCategory', [UserController::class, 'changeCategory'])->name('user.changeCategory');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::put('/appointment/{appointment}', [AppointmentController::class, 'changeStatus']);
    Route::put('/treatment/{treatment}', [TreatmentController::class, 'update'])->name('treatment.update');
    Route::put('/diagnose/{diagnose}', [DiagnoseController::class, 'update'])->name('diagnose.update');
    Route::put('/advice/{advice}', [AdviceController::class, 'update'])->name('advice.update');
    Route::put('/schedule/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');

    Route::delete('/schedule/{schedule}', [ScheduleController::class, 'delete']);
    Route::delete('/treatment/{treatment}', [TreatmentController::class, 'delete']);
    Route::delete('/diagnose/{diagnose}', [DiagnoseController::class, 'delete']);
    Route::delete('/advice/{advice}', [AdviceController::class, 'delete']);
    Route::delete('/request/{request}', [UserController::class, 'deleteRequest']);
    Route::delete('/category/{category}', [CategoryController::class, 'delete']);
    Route::delete('/user/{user}', [UserController::class, 'deleteUser']);
    Route::delete('/appointment/{appointment}', [AppointmentController::class, 'delete']);
    Route::delete('/blog/{blog}', [BlogController::class, 'delete']);
});
