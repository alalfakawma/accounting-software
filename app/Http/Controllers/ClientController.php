<?php

namespace App\Http\Controllers;

use App\Client;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
	/**
	 * Check GSTIN and return the full GSTIN
	 * @return \Illuminate\Http\Response
	 */
    public function checkGSTIN(Request $request) {
    	return json_encode(Client::where('gstin', 'LIKE', '%' . $request->gstin . '%')->pluck('gstin')->first());
    }

    /**
     * Delete client
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
    	// Delete all purchases
    	$p = Purchase::where('client_id', $id)->pluck('id')->toArray();
    	Purchase::destroy($p);
    	// Delete account
    	$c = Client::find($id);
    	$c->delete();

    	return redirect()->back();
    }
}
