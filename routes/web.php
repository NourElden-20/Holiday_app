<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ProfileController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard',[DashboardController::class,'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Employee Routes
  Route::get('employee/dashboard', [DashboardController::class,'index'])->name('employeeDashboard');
    Route::get('leave/create',[LeaveRequestController::class,'create'])->name('create');
    Route::post('leave/store',[LeaveRequestController::class,'store'])->name('store');
    Route::get('employee/leave/requests',[LeaveRequestController::class,'myRequests'])->name('myRequests');


    // Admin Routes (محمي بالـ Middleware isAdmin)
     Route::middleware(['isAdmin'])->group(function () {
        Route::get('admin/dashboard',[DashboardController::class,'index'])->name('index'); // خليه للأدمن
        Route::get('admin/requests',[LeaveRequestController::class,'adminRequests'])->name('adminRequests');
        Route::post('admin/approve/{id}',[LeaveRequestController::class,'approve'])->name('approve');
        Route::post('admin/reject/{id}',[LeaveRequestController::class,'reject'])->name('reject');
        Route::get('admin/view/{id}',[LeaveRequestController::class,'showRequestDetails'])->name('showRequestDetails');
        Route::get('admin/createUser',[LeaveRequestController::class,'createUser'])->name('createUser');
        Route::post('admin/newUser',[LeaveRequestController::class,'newUser'])->name('newUser');
    });


    // Edit and delete
    Route::get('edit/{id}',[LeaveRequestController::class,'edit'])->name('edit');
    Route::put('leave/update/{id}', [LeaveRequestController::class, 'update'])->name('update');
    Route::delete('/delete_request/{id}', [LeaveRequestController::class, 'destroy'])->name('delete');
});

require __DIR__.'/auth.php';
