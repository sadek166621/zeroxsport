<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddManualPaymentFieldsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_number')->nullable()->after('payment_method');
            $table->decimal('payment_amount', 10, 2)->nullable()->after('payment_number');
            $table->string('transaction_id')->nullable()->after('payment_amount');
            $table->string('payment_screenshot')->nullable()->after('transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'payment_number', 'payment_amount', 'transaction_id', 'payment_screenshot']);
        });
    }
}
