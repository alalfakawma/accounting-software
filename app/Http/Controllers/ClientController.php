<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
	/**
	 * Check GSTIN and return the full GSTIN
	 * @return \Illuminate\Http\Response
	 */
    public function checkGSTIN(Request $request) {
    	return json_encode(Client::where('gstin', 'LIKE', '%' . $request->gstin . '%')->pluck('gstin')->first());
    }
}
