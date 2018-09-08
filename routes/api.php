<?php

use Illuminate\Http\Request;

Route::middleware('api')->group(function() {
	Route::prefix('/purchase')->group(function() {
		Route::post('/store', 'PurchaseController@store');
	});
	Route::prefix('/client')->group(function() {
		Route::get('/checkGSTIN', 'ClientController@checkGSTIN');
	});
});