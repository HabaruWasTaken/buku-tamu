<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::resource('/employee', App\Http\Controllers\EmployeeController::class);
Route::post('/employee/search', [App\Http\Controllers\EmployeeController::class, 'search'])->name('search');

Route::resource('/visit_history', App\Http\Controllers\VisitHistoryController::class);
Route::post('/visit_history/search', [App\Http\Controllers\VisitHistoryController::class, 'search'])->name('search');
Route::get('/visit_history/export/excel', [App\Http\Controllers\VisitHistoryController::class, 'export_excel'])->name('visit_history.export_excel');
Route::get('/visit_history/export/pdf', [App\Http\Controllers\VisitHistoryController::class, 'export_pdf'])->name('visit_history.export_pdf');