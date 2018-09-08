<?php

use App\Purchase;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DummyPurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        // Make dummy purchases
    	for ($i=0; $i < 5; $i++) { 
    		$p = new Purchase();
    		$p->client_id = mt_rand(1, 5);
    		$p->hsn_code = mt_rand(11111, 99999);
    		$p->name = $faker->company;
    		$p->price = mt_rand(20, 500);
    		$p->quantity = mt_rand(1, 5);
    		$p->unit = $faker->randomElement(['Kilogram', 'Gram']);
    		$p->taxable_value = mt_rand(1000, 9000);
    		$p->tax_rate = mt_rand(5, 20);
    		$p->cess = mt_rand(5000, 9000);
    		$p->save();
    	}
    }
}
