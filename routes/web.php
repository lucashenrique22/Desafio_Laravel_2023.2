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
    //users routes
    Route::get('/users', [ProfileController::class, 'index'])->name('users.index')->can('isAdmin', '\App\Models\User');
    Route::post('/users/create', [ProfileController::class, 'create'])->name('users.create')->can('isAdmin', '\App\Models\User');
    Route::post('/users/store', [ProfileController::class, 'store'])->name('users.create')->can('isAdmin', '\App\Models\User');
    Route::post('/users/delete/{id}', [ProfileController::class, 'destroy'])->name('users.destroy')->can('isAdmin', '\App\Models\User');
    Route::get('/users/show', [ProfileController::class, 'show'])->name('users.show');

    //owner routes

    Route::resource('/owners', \App\Http\Controllers\OwnerController::class)
        ->only(['index', 'create', 'store', 'destroy', 'show']);

    //animal routes
    Route::resource('/animals', \App\Http\Controllers\AnimalController::class)
        ->only(['index', 'create', 'store', 'destroy', 'show']);

    //appointments routes

    Route::resource('/appointments', \App\Http\Controllers\AppointmentController::class)
        ->only(['index', 'create', 'store', 'destroy', 'show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//email

Route::get('/email/index', [\App\Http\Controllers\EmailController::class, 'index'])->can('isAdmin', '\App\Models\User');
Route::post('/email/send', [\App\Http\Controllers\EmailController::class, 'send'])->can('isAdmin', '\App\Models\User');;

//pdf generator
Route::get('pdf', [\App\Http\Controllers\PdfController::class, 'generate'])->name('pdf.index');


require __DIR__.'/auth.php';
