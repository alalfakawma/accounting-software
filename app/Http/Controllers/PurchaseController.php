<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
	/**
	 * Store the purchase
	 * @param  \Illuminate\Http\Request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$purchaseData = json_encode($request->data);

		return json_encode(true);		
	}
}