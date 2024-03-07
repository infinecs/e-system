<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_list', function (Blueprint $table) {
            $table->id();
            $table->string('asset_name');
            $table->string('device_image');
            $table->string('asset_tag');
            $table->string('serial');
            $table->string('model');
            $table->string('category');
            $table->string('status');
            $table->string('checked_out_to');
            $table->string('location');
            $table->string('current_value');
            $table->string('upload_signed_document');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_list');
    }
};
