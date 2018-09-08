<?php

Route::get('/', function() {
	return redirect()->route('dashboard');
})->middleware('auth');

Auth::routes();

Route::middleware('auth')->group(function() {
	Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');
	Route::prefix('/clients')->group(function() {
		Route::get('/', 'PageController@clients')->name('clients');
		Route::get('/{client_slug}/overview', 'PageController@overview')->name('overview-client');
		Route::delete('/{client_id}/delete', 'ClientController@destroy')->name('delete-client');
	});
	Route::get('/add-purchase', 'PageController@addpurchase')->name('add-purchase');
});