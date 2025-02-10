<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

// Routes pour les pages principales

Route::get('/', function () {
    return view('home');
})->name('home');

// Routes pour les ressources Cars, Reservations et Payments

Route::resource('cars', CarController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('payments', PaymentController::class);

// Routes pour le formulaire de contact

Route::get('/contact', function () {
    return view('form');
})->name('contact');
Route::post('/contact/submit', [ContactController::class, 'sendContact'])->name('contact.submit');

// Route pour le formulaire de paiement

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

// Route pour le formulaire de resevations 

Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

// Définition de la route pour l'URL '/social'

Route::get('/social', function () {
    return view('social');
});