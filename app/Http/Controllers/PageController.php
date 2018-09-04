<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class PageController extends Controller
{
	/**
	 * Return Clients frontend
	 * @return \Illuminate\Http\Response
	 */
    public function clients() {
    	// Get clients
    	$clients = Client::all();
    	return view('pages.clients')->with('clients', $clients);
    }

    /**
     * Overview client area
     * @return \Illuminate\Http\Response
     */
    public function overview($slug) {
    	$client = Client::where('slug', $slug)->first();
    	return view('pages.overview')->with('client', $client);
    }

    /**
     * Dashboard
     * @return \Illuminate\Http\Response
     */
    public function dashboard() {
    	return view('pages.dashboard');
    }

    /**
     * Add purchases page
     * @return \Illuminate\Http\Response
     */
    public function addpurchase() {
        return view('pages.addpurchase');
    }
}
