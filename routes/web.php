<?php

use Illuminate\Support\Facades\Route;
use App\Sign;
use App\Horoscope;

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

Route::get('/', function () {
    if (Sign::count() == 0 || Horoscope::count() == 0)
        return view('guest.empty');

    return view('guest.home');
})->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/upload', function () {
        $sign = Sign::count();

        return view('pages.upload', compact('sign'));
    })->name('upload.index');
    Route::post('/upload/horoscopes', 'HoroscopeController@store')->name('horoscope.store');
    Route::post('/upload/signs', 'SignController@store')->name('sign.store');
});

Route::fallback(function () {
    return view('guest.home');
});