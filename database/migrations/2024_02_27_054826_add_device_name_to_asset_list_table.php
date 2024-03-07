<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeviceNameToAssetListTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('asset_list', function (Blueprint $table) {
            $table->string('device_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('asset_list', function (Blueprint $table) {
            $table->dropColumn('device_name');
        });
    }
}
