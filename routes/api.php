<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function() {
	Route::prefix('/purchase')->group(function() {
		Route::post('/store', 'PurchaseController@store');
	});
});