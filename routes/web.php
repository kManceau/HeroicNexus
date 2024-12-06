<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hero', [\App\Http\Controllers\HeroController::class, 'index'])->name('hero.index');
Route::get('/hero/create', [\App\Http\Controllers\HeroController::class, 'create'])
    ->name('hero.create')
    ->middleware('auth');
Route::resource('/hero', \App\Http\Controllers\HeroController::class)
    ->only(['edit', 'destroy'])
    ->middleware('auth');
Route::post('/hero/store', [\App\Http\Controllers\HeroController::class, 'store'])
    ->name('hero.store');
