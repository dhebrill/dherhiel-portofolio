<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/pdf-data', function (\Illuminate\Http\Request $request) {
    $path = $request->query('f');
    abort_unless($path && file_exists(storage_path('app/public/' . $path)), 404);

    return response()->json([
        'data' => base64_encode(file_get_contents(storage_path('app/public/' . $path))),
    ]);
})->name('pdf-data');

Route::get('/pdf-file', function (\Illuminate\Http\Request $request) {
    $path = $request->query('f');
    abort_unless($path && file_exists(storage_path('app/public/' . $path)), 404);

    return response()->file(storage_path('app/public/' . $path), [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
    ]);
})->name('pdf-file');
