<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\leaveRequestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard.blade.php',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//employee
Route::get('index', function(){
return view('index');
});
Route::get('leave/create',[leaveRequestController::class,'create'])->name('create');
Route::post('leave/store',[leaveRequestController::class,'store'])->name('store');
Route::get('my-Requests',[leaveRequestController::class,'myRequests'])->name('myRequests');
//admin
Route::get('admin/request',[leaveRequestController::class,'index'])->name('index');
Route::post( 'admin/approve/{id}',[leaveRequestController::class,'approve'])->name('approve');
Route::post( 'admin/reject/{id}',[leaveRequestController::class,'reject'])->name('reject');



require __DIR__.'/auth.php';
