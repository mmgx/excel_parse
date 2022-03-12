<?php

use App\Http\Controllers\{FileController, RowController};
use Illuminate\Support\Facades\Route;


Route::get('/', [FileController::class, 'showForm'])->name('home');
Route::post('/upload', [FileController::class, 'upload'])->name('upload');

Route::get('/result', [RowController::class, 'getRowTable'])->name('rows');
