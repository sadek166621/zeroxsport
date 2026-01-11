<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturningProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returning_products', function (Blueprint $table) {
            $table->id();
            $table->integer('ordered_product_id'); //order_detials id
            $table->bigInteger('product_id');
            $table->bigInteger('vendor_id');
            $table->string('issue');
            $table->integer('qty');
            $table->text('image');
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
        Schema::dropIfExists('returning_products');
    }
}
