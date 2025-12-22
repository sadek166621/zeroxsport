<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_structures', function (Blueprint $table) {
            $table->id();
            // category relation
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // commission rate (percentage)
            $table->decimal('commission_rate', 5, 2)->default(0);

            // mode (fixed / percentage)
            $table->enum('mode', ['fixed', 'percentage'])->default('percentage');

            // status
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('commission_structures');
    }
}
