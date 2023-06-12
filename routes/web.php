<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InertiaTestController;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/inertia-test', function () {
    return Inertia::render('InertiaTest');
});

Route::get('/calendar', function () {
    return Inertia::render('Calendar');
})->name('calendar');

Route::get('/inertia/index', [InertiaTestController::class, 'index'])->name('inertia.index');

Route::get('/inertia/show/{id}', [InertiaTestController::class, 'show'])->name('inertia.show');

Route::post('/inertia', [InertiaTestController::class, 'store'])->name('inertia.store');

Route::post('/Calendar/store', [ScheduleController::class, 'store'])->name('calendar.store');

Route::post('/Calendar/get', [ScheduleController::class, 'get'])->name('calendar.get');

Route::post('/Calendar/delete', [ScheduleController::class, 'delete'])->name('calendar.delete');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
