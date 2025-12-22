<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBankFieldsToVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('bank_document')->nullable()->after('bank_account');
            $table->string('alternative_payment')->nullable()->after('bank_document');
            $table->string('account_number')->nullable()->after('alternative_payment');
            $table->tinyInteger('shipping_zone')->default(1)->after('account_number')->comment('1=Inside Dhaka, 2=Outside Dhaka, 3=Outside Dhaka City');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn(['bank_document', 'alternative_payment', 'account_number', 'shipping_zone']);
        });
    }
}
