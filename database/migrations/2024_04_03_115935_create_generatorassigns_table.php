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
        Schema::create('generatorassigns', function (Blueprint $table) {
            $table->id();
            $table->string('asset_number');
            $table->string('dg_range');
            $table->unsignedBigInteger('engine_srno');
            $table->string('engine_make');
            $table->unsignedBigInteger('alternator_srno');
            $table->string('alternator_make');
            $table->unsignedBigInteger('battery_srno');
            $table->string('battery_make');
            $table->string('oil_filter_part_code', 20); // Adjust the length as needed
            $table->string('diesel_filter_part_code', 20); // Adjust the length as needed
            $table->string('air_filter_part_code', 20); // Adjust the length as needed
            $table->string('asset_photos'); // Assuming you store file paths
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generatorassigns');
    }
};
