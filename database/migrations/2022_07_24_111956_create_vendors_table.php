<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('seller_type')->comment('1=>Individual, 2=>Business');
            $table->string('shop_name', 150)->nullable();
            $table->string('slug', 200)->unique()->nullable();
            $table->string('phone', 20);
            $table->string('email')->unique();
            $table->text('address')->nullable();

            $table->string('full_name', 150)->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('nid_number', 17)->nullable();

            $table->string('owner_name', 150)->nullable();
            $table->tinyInteger('business_type')->nullable()->comment('1=>Sole, 2=>Partnership, 3=>Limited');
            $table->string('trade_license_no', 100)->nullable();
            $table->string('bin_tin', 100)->nullable();

            $table->string('profile_photo')->nullable();
            $table->string('shop_cover')->nullable();
            $table->string('nid_front')->nullable();
            $table->string('nid_back')->nullable();
            $table->string('trade_license_doc')->nullable();

            $table->decimal('commission', 8, 2)->default(0);
            $table->tinyInteger('commission_type')->default(1)->comment('1=>Percentage, 2=>Fixed');
            $table->text('description')->nullable();
            $table->string('fb_url')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('holder_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('routing_number')->nullable();

            $table->tinyInteger('shipping_zone')->default(0)->comment('1=Inside Dhaka, 2=Outside Dhaka, 3=Outside Dhaka City');
            $table->tinyInteger('status') ->comment('0=>Inactive, 1=>Active, 2=>Suspended, 3=>Rejected')->default(0);
            $table->boolean('is_request')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();

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
        Schema::dropIfExists('vendors');
    }
}
