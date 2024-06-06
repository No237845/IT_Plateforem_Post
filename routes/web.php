<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

Route::resource('/profil', App\Http\Controllers\ProfilController::class);

Route::resource('/categorie', App\Http\Controllers\CategorieController::class);

Route::resource('/competence',App\Http\Controllers\CompetenceController::class);

Route::resource('/experience', App\Http\Controllers\ExperienceController::class);

Route::resource('/certification', App\Http\Controllers\CertificationController::class);

Route::resource('/cv_et_motivation', App\Http\Controllers\CvEtMotivationController::class);