<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Employees 
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::patch('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    // Attendances
    Route::get('/attendances/mark/{employee_id}', [AttendenceController::class, 'index'])->name('attendances.index');
    Route::get('/attendances/create', [AttendenceController::class, 'create'])->name('attendances.create');
    Route::post('/attendances', [AttendenceController::class, 'store'])->name('attendances.store');
    Route::get('/attendances/{attendance}', [AttendenceController::class, 'show'])->name('attendances.show');
    Route::get('/attendances/{attendance}/edit', [AttendenceController::class, 'edit'])->name('attendances.edit');
    Route::patch('/attendances/{attendance}', [AttendenceController::class, 'update'])->name('attendances.update');
    Route::delete('/attendances/{attendance}', [AttendenceController::class, 'destroy'])->name('attendances.destroy');

    
});

require __DIR__.'/auth.php';
