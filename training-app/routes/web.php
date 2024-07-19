<?php

use App\Http\Controllers\AdminController;
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
    return view('welcome2');
});

Route::get('/admin', [AdminController::class, 'getUsers'])->name('adminRoute');

Route::get('/add-user/{role}', [AdminController::class, 'addView'])->name('add-HR-form');

Route::post('/actionAdd-user/{role}', [AdminController::class, 'add'])->name('addHR');

Route::get('/HumanResources', function (){
    return view('rhView');
});

Route::get('/trainee', function (){
    return view('traineeView');
});

Route::get('/checkConnection', function (){
    return view('checkDB');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
