<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->unsignedBigInteger('affiliate_id')->nullable();

            $table->decimal('subtotal', 20, 2)->default(0);
            $table->decimal('shipping_cost', 20, 2)->default(0);
            $table->decimal('discount', 20, 2)->default(0);
            $table->decimal('coupon_discount', 20, 2)->default(0);
            $table->decimal('tax', 20, 2)->default(0);
            $table->decimal('grand_total', 20, 2)->default(0);

            $table->decimal('commission', 20, 2)->default(0);
            $table->decimal('vendor_earning', 20, 2)->default(0);

            $table->tinyInteger('payment_status')->default(0)->comment('1=>paid, 0=>Unpaid');
            $table->tinyInteger('delivery_status')->default(0)->comment('0=>Pending, 1=>Confirmed, 2=>Processing, 3=>Shipped, 4=>Delivered, 5=>Canceled, 6=>Returned, 7=>Refunded, 8=>Failed');

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
        Schema::dropIfExists('vendor_orders');
    }
}
