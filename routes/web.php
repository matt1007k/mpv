<?php

use App\Http\Controllers\Admin\DocumentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('index');

Route::get('/message-success', function () {
    return view('pages.message-success');
})->name('pages.message-success');

Route::get('/documents/create', function () {
    return view('pages.create-document');
})->name('documents.create');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DocumentsController::class, 'index'])->name('dashboard');
    Route::get('/documents/{document}', [DocumentsController::class, 'show'])->name('admin.documents.show');
});
