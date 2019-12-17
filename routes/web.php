<?php

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
    return redirect('home');
});
Auth::routes();

Route::get('/home', 'Home@index')->name('home');
Route::namespace('Admin')->group(function () {
    Route::get('/create', 'CreateDoc@get')->name('create');
    Route::post('/create', 'CreateDoc@post');
    Route::get('/drafts', 'Drafts@get')->name('drafts');
    Route::post('/drafts', 'Drafts@post');
    Route::get('/history', 'History@get')->name('history');
    Route::post('/history', 'History@post');
    Route::get('/profile', 'Profile@get')->name('profile');
    Route::post('/profile', 'Profile@post');
});
Route::get('/topdf/{id}', 'Home@topdf');
Route::get('/todoc/{id}', 'Home@todoc');
Route::get('/toemail/{id}', 'Home@toemail');
Route::get('/toprint/{id}', 'Home@toprint');
