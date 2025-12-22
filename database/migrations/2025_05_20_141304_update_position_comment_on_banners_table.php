<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePositionCommentOnBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
             $table->string('position')
                ->comment('0 => Footer Banner, 1 => Home Banner, 2 => Middle Banner')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('position')
                ->comment('1 => Home Banner, 0 => Footer Banner')
                ->change();
        });
    }
}
