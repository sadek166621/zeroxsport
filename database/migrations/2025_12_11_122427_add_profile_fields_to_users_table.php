<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('pickup_address')->nullable()->after('address');
            $table->string('warehouse_address')->nullable()->after('pickup_address');
            $table->string('office_address')->nullable()->after('warehouse_address');
            $table->unsignedBigInteger('division')->nullable()->after('office_address');
            $table->unsignedBigInteger('district')->nullable()->after('division');
            $table->unsignedBigInteger('upazilla')->nullable()->after('district');
            $table->string('map_location')->nullable()->after('upazilla');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'pickup_address',
                'warehouse_address',
                'office_address',
                'division',
                'district',
                'upazilla',
                'map_location'
            ]);
        });
    }
}
