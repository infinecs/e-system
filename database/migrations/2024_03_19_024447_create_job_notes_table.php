<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobNotesTable extends Migration
{
    public function up()
    {
        Schema::create('job_notes', function (Blueprint $table) {
            $table->id();
            $table->string('job_reference'); // Foreign key referencing job reference in positions table
            $table->foreign('job_reference')->references('job_reference')->on('job_details')->onDelete('cascade');
            $table->text('note');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_notes');
    }
}

