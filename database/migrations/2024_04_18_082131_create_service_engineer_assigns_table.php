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
        Schema::create('service_engineer_assigns', function (Blueprint $table) {
            $table->id();
            $table->string('service_engineer');
            $table->enum('engineer_id', [1, 2, 3, 4]); // Define enum values here
            $table->string('engine_srno')->nullable();
            $table->string('engine_make')->nullable();
            $table->string('alternator_srno')->nullable();
            $table->string('alternator_make')->nullable();
            $table->string('battery_srno')->nullable();
            $table->string('battery_make')->nullable();
            $table->string('oil_filter_part')->nullable();
            $table->string('diesel_filter_part')->nullable();
            $table->string('air_filter_part')->nullable();
            $table->string('asset_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_engineer_assigns');
        
    }
};
