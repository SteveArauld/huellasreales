<?php

use App\Http\Controllers\CachorroController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;





Route::get('/search', [CachorroController::class, 'search'])->name('search');
Route::get('/search/autocomplete', [CachorroController::class, 'autocomplete'])->name('search.autocomplete');
Route::get('/search/race-details', [CachorroController::class, 'raceDetails'])->name('search.race-details');



Route::get('/', [CachorroController::class, 'home'])->name('home');


// Dans routes/web.php
Route::post('/puppies/reserve/{slug}', [CachorroController::class, 'reserve'])->name('puppies.reserve');




// Dans routes/web.php
Route::post('/contact-form', [EmailController::class, 'sendContactForm'])->name('contact.form');
Route::post('/process-order', [EmailController::class, 'processOrder'])->name('process.order');


Route::post('/notify-admin', [EmailController::class, 'notifyAdmin']);



Route::post('/order/{slug}', [CachorroController::class, 'processOrder'])->name('order.process');


Route::get('/breeds/{slug}', [CachorroController::class, 'cachorrosraza'])->name('cachorrosraza');

Route::get('/cachorros-disponibles/{slug}', [CachorroController::class, 'show'])->name('cachorros.show');




Route::get('/puppies', [CachorroController::class, 'puppies'])->name('puppies');

Route::get('/entrega', [CatController::class, 'entrega'])->name('entrega');


Route::get('/garantia', [CatController::class, 'garantia'])->name('garantia');

Route::get('/testimonials', [CatController::class, 'testimonials'])->name('testimonials');
Route::get('/buscar-gatos', [CatController::class, 'search'])->name('cats.search');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');





Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/process', function () {
    return view('pages.process');
})->name('process');

Route::get('/referencias', function () {
    return view('pages.referencias');
})->name('referencias');





