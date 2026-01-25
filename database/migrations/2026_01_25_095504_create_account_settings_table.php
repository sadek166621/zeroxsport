<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_settings', function (Blueprint $table) {
            $table->id();

            // Shipping charges
            $table->decimal('shipping_inside_dhaka', 8, 2)->default(70);
            $table->decimal('shipping_outside_dhaka', 8, 2)->default(130);
            $table->decimal('shipping_all_area', 8, 2)->default(180);

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
        Schema::dropIfExists('account_settings');
    }
}
