<?php

use App\Client;
use Illuminate\Database\Seeder;

class DummyClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Create dummy client
    	$client = new Client();
    	$client->name = "Dummy Client";
    	$client->gstin = "283947562893921";
        $client->slug = str_slug("Dummy Client");
    	$client->save();
    }
}
