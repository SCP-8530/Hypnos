<?php

use App\Http\Controllers\EnseignantController;
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

Route::get('/creationhoraire', [\App\Http\Controllers\Controller::class, 'creationhoraire'])->name('creationhoraire');

Route::get('/accueil', [\App\Http\Controllers\Controller::class, 'accueil'])->name('pageAccueil');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function (){
   Route::resource('enseignants', EnseignantController::class);
   Route::resource('horaires',\App\Http\Controllers\HoraireController::class);
   Route::resource('locaux',\App\Http\Controllers\LocalController::class);
   Route::resource('cheminements', \App\Http\Controllers\CheminementController::class);
   Route::resource('groupe_cours', \App\Http\Controllers\GroupeCoursController::class);
   Route::resource('cours', \App\Http\Controllers\CoursController::class);
   Route::resource('contraintes', \App\Http\Controllers\ContrainteController::class);
    Route::resource('horaire', \App\Http\Controllers\HoraireController::class);
    Route::resource('bloc_cours',\App\Http\Controllers\Bloc_CoursController::class);
    Route::resource('bloc_heures',\App\Http\Controllers\Bloc_HeuresController::class);
    Route::resource('sessions', \App\Http\Controllers\SessionController::class);
    Route::resource('campus', \App\Http\Controllers\CampusController::class);
    Route::resource('local', \App\Http\Controllers\LocalController::class);
});

require __DIR__.'/auth.php';
