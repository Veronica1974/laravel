<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->decimal('sale_price');
            $table->enum('currency', array('ILS', 'USD', 'EUR'));
            $table->dateTime('datetime');
            $table->integer('payme_sale_code');
            $table->string('sale_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales');
    }
}
