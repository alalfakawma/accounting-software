<?php

Route::get('/', function() {
	return redirect()->route('dashboard');
})->middleware('auth');

Auth::routes();

Route::middleware('auth')->group(function() {
	Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');
	Route::get('/{client_slug}/overview', 'PageController@overview')->name('overview-client');
	Route::get('/clients', 'PageController@clients')->name('clients');
	Route::get('/add-purchase', 'PageController@addpurchase')->name('add-purchase');
});