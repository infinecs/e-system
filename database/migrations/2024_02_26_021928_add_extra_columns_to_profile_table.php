<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnsToProfileTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('username')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('about')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('username');
            $table->dropColumn('mobile');
            $table->dropColumn('email');
            $table->dropColumn('company');
            $table->dropColumn('about');
        });
    }
}
