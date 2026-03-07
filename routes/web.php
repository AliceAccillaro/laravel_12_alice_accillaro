<?php

use App\Http\Controllers\PubblicController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PubblicController::class, 'homepage'])->name('homepage');

Route::get('/Chi-siamo', [PubblicController::class, 'aboutUs'])->name('aboutUs');
Route::get('/Chi-siamo/detail/{nome}', [PubblicController::class, 'aboutUsDetail'])->name('aboutUsDetail');

Route::get('/Contatti', function () {
    return view('contacts');
})->name('contacts');

Route::post('/contact-us', [PubblicController::class, 'contactUs'])->name('contactUs');


Route::get('/movies', [MovieController::class, 'index'])->name('movie.index');
Route::get('/movie/show/{movie}', [MovieController::class, 'show'])->name('movie.show');
Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
Route::post('/movie/submit', [MovieController::class, 'store'])->name('movie.submit');
Route::get('/movie/edit/{movie}', [MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movie/update/{movie}', [MovieController::class, 'update'])->name('movie.update');
Route::delete('/movie/delete/{movie}', [MovieController::class, 'destroy'])->name('movie.delete');