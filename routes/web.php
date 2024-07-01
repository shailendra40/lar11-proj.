<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/student', [StudentController::class, 'index'])->name('lar.student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('lar.student.create');
Route::post('/student', [StudentController::class, 'store'])->name('lar.student.store');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('lar.student.show');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('lar.student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('lar.student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('lar.student.destroy');
