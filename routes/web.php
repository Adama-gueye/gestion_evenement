<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
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

Route::get('/',[EvenementController::class, 'acceuil'])->name('acceuil');
Route::get('/apropos',[EvenementController::class, 'apropos'])->name('apropos');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth','role:association')->group(function () {
    Route::get('/indexAssociation{id}', [AssociationController::class, 'index'])->name('association.index');
    Route::post('/evenementStore', [EvenementController::class, 'store'])->name('evenement.store');
    Route::get('/evenementShow{id}', [EvenementController::class, 'show'])->name('evenement.show');
    Route::delete('/evenementDestroy{id}', [EvenementController::class, 'destroy'])->name('evenement.destroy');
    Route::patch('/evenementUpdate{id}', [EvenementController::class, 'update'])->name('evenement.update');
    Route::patch('/reservation/{id}', [ReservationController::class,'changeEtat'])->name('reservation.changeEtat');
    Route::delete('/reservationDestroy/{id}', [ReservationController::class,'destroy'])->name('reservation.destroy');
});
Route::middleware('auth','role:client')->group(function () {
    Route::get('/indexClient{id}', [ClientController::class, 'index'])->name('client.index');
    Route::get('/reservation{id}', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('/reservationStore', [ReservationController::class, 'store'])->name('reservation.store');
});

require __DIR__.'/auth.php';
