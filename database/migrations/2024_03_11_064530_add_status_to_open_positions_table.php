<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('open_positions', function (Blueprint $table) {
            $table->boolean('status')->default(1);
            // You can also use the following line if you want the default value to be 0
            // $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('open_positions', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};