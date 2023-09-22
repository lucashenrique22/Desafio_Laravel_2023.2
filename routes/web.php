<?php

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
    return redirect(route('dashboard'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//user routes
Route::resource('/users', ProfileController::class)
    ->only(['index', 'create', 'store', 'destroy', 'show']);

//owner routes
Route::resource('/owners', \App\Http\Controllers\OwnerController::class)
    ->only(['index', 'create', 'store', 'destroy', 'show']);

//animal routes
Route::resource('/animals', \App\Http\Controllers\AnimalController::class)
    ->only(['index', 'create', 'store', 'destroy', 'show']);

Route::resource('/appointments', \App\Http\Controllers\AppointmentController::class)
    ->only(['index', 'create', 'store', 'destroy', 'show']);

//email

Route::get('/email/index', [\App\Http\Controllers\EmailController::class, 'index']);
Route::post('/email/send', [\App\Http\Controllers\EmailController::class, 'send']);


require __DIR__.'/auth.php';
