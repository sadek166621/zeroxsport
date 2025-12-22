<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerPenaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_penalties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade'); // vendor (role = 2)
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('set null');
            $table->foreignId('order_id')->nullable()->constrained('orders')->onDelete('set null');

            $table->decimal('amount', 10, 2)->default(0.00); // Penalty amount in BDT
            $table->string('type'); // e.g., 'late_shipment', 'fake_stock', 'fake_product', 'excessive_cancellation'
            $table->text('reason')->nullable(); // Admin note
            $table->boolean('is_ban')->default(false); // If true → account banned (for fake product)

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Admin who applied penalty
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
        Schema::dropIfExists('seller_penalties');
    }
}
