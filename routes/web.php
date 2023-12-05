<?php

use App\Http\Controllers\SupportController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('support.destroy');
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('support.update');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('support.edit');
Route::get('/supports/create', [SupportController::class, 'create'])->name('support.create');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('support.show');
Route::get('/contact', [SiteController::class, 'contact']);
Route::get('/supports', [SupportController::class, 'index'])->name('support.index');
Route::post('/supports', [SupportController::class, 'store'])->name('support.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
