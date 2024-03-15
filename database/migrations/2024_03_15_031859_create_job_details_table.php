<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();
            $table->string('job_reference')->unique(); // Changed from job_id to job_reference
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')->references('id')->on('open_positions'); // Adjusted reference to open_positions table
            $table->string('remote');
            $table->string('office_address');
            $table->integer('headcount');
            $table->string('experience_level');
            $table->date('expected_close_date');
            $table->decimal('min_salary', 10, 2);
            $table->decimal('max_salary', 10, 2);
            $table->string('currency', 3);
            $table->string('frequency');
            $table->string('contract_details');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_details');
    }
}
