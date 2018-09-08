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
        for ($i=1; $i <= 5; $i++) { 
            $client = new Client();
            $client->name = "Dummy Client " . $i;
            $client->gstin = mt_rand(111111111111111, 999999999999999);
            $client->slug = str_slug("Dummy Client " . $i);
            $client->save();
        }
    }
}
