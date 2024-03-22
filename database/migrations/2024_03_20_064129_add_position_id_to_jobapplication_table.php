<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPositionIdToJobapplicationTable extends Migration
{
    public function up()
    {
        // Add the 'position_id' column as nullable
        Schema::table('jobapplication', function (Blueprint $table) {
            $table->unsignedBigInteger('position_id')->nullable();
        });

        // Get existing 'position_id' values from the 'open_positions' table
        $openPositions = DB::table('open_positions')->pluck('id');

        // Add foreign key constraint if there are existing 'position_id' values
        if ($openPositions->isNotEmpty()) {
            Schema::table('jobapplication', function (Blueprint $table) use ($openPositions) {
                $table->foreign('position_id')->references('id')->on('open_positions')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::table('jobapplication', function (Blueprint $table) {
            $table->dropForeign(['position_id']);
            $table->dropColumn('position_id');
        });
    }
}
