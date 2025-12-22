<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('affiliate_member_id');
            $table->string('email');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('referral_code')->nullable();
            $table->decimal('total_earning', 10, 2)->default(0.00);
            $table->decimal('balance', 10, 2)->default(0.00);
            $table->string('password');
            $table->tinyInteger('status')->default(1)->comment('1=>Active, 0=>Inactive');
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
        Schema::dropIfExists('affiliates');
    }
}
