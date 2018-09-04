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
            $table->integer('hsn_code');
            $table->string('name');
            $table->integer('quantity')->unsigned();
            $table->string('unit');
            $table->bigInteger('taxable_value');
            $table->smallInteger('tax_rate')->unsigned();
            $table->smallInteger('igst')->unsigned()->nullable();
            $table->smallInteger('cgst')->unsigned()->nullable();
            $table->smallInteger('sgst')->unsigned()->nullable();
            $table->smallInteger('cess')->unsigned()->nullable();
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
