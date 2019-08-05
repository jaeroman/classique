<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productName');
            $table->unsignedInteger('product_type_id');
            $table->foreign('product_type_id')->references('id')->on('product_type')->onDelete('cascade');
            $table->string('productPrice');
            $table->text('productDescription')->nullable();
            $table->text('bvPoints');
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
        Schema::dropIfExists('product');
    }
}
