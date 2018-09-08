<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('hsn_code');
            $table->string('name');
            $table->integer('quantity')->unsigned();
            $table->string('unit');
            $table->bigInteger('taxable_value');
            $table->smallInteger('tax_rate')->unsigned();
            $table->integer('igst')->unsigned()->nullable();
            $table->integer('cgst')->unsigned()->nullable();
            $table->integer('sgst')->unsigned()->nullable();
            $table->integer('cess')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
