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
        Schema::create('master_histories', function (Blueprint $table) {
            $table->id();
            $table->string('service_engineer');
            $table->enum('engineer_id', [1, 2, 3, 4]); // Define enum values here
            $table->string('engine_srno');
            $table->string('engine_make');
            $table->string('alternator_srno');
            $table->string('alternator_make');
            $table->string('battery_srno');
            $table->string('battery_make');
            $table->string('oil_filter_part');
            $table->string('diesel_filter_part');
            $table->string('air_filter_part');
            $table->string('asset_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_histories');
    }
};
