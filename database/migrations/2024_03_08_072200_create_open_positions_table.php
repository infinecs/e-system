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
        Schema::create('open_positions', function (Blueprint $table) {
            $table->id();
            $table->string('position_name');
            $table->text('job_description'); // Storing PDF in the filesystem or reference to it
            $table->string('pdf_file')->nullable(); // Add a column to store the PDF file reference
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('open_positions');
    }
};
