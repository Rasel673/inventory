<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('cat_id');
            $table->integer('sup_id');
            $table->string('product_code');
            $table->string('product_storage');
            $table->string('product_route');
            $table->string('product_image');
            $table->string('buy_date');
            $table->string('expire_date');
            $table->string('buying_price');
            $table->string('selling_price');
          
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
        Schema::dropIfExists('products');
    }
}
