<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FilmController;

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

Route::get('contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('films/find', [FilmController::class, 'find'])->name('films.find');
Route::get("/", [FilmController::class, "index"]);
Route::resource('films', FilmController::class);
Route::get('categorie/{nom}/films', [FilmController::class, 'index2'])->name('films.categorie');
