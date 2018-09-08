<?php

namespace App\Http\Controllers;

use App\Client;
use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
	/**
	 * Store the purchase
	 * @param  \Illuminate\Http\Request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$purchaseData = json_decode($request->data);

		foreach ($purchaseData as $data) {
			$p = new Purchase();
			$p->client_id = Client::where('gstin', $data->gstin)->pluck('id')->first();
			$p->hsn_code = $data->hsncode;
			$p->name = $data->name;
			$p->price = $data->price;
			$p->quantity = $data->quantity;
			$p->unit = $data->unit;
			$p->taxable_value = $data->taxablevalue;
			$p->tax_rate = $data->taxrate;
			$p->igst = $data->igst;
			$p->cgst = $data->cgst;
			$p->sgst = $data->sgst;
			$p->cess = $data->cess;
			$p->save();
		}

		return json_encode(true);		
	}
}