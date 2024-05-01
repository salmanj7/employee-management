<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/dashboard', [CompanyController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employee.show');

});




Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
