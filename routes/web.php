<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/{id}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employee.destroy');

Route::get('/visit_history', [App\Http\Controllers\VisitHistoryController::class, 'index'])->name('visit_history.index');
Route::get('/visit_history/create', [App\Http\Controllers\VisitHistoryController::class, 'create'])->name('visit_history.create');
Route::post('visit_history', [App\Http\Controllers\VisitHistoryController::class, 'store'])->name('visit_history.store');
Route::put('/employee/{id}', [App\Http\Controllers\VisitHistoryController::class, 'update'])->name('visit_history.update');
Route::delete('/visit_history/{id}', [App\Http\Controllers\VisitHistoryController::class, 'destroy'])->name('visit_history.destroy');