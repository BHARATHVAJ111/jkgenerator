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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_no');
            $table->enum('type', ['2w', '4w']); // Define as enum with allowed values
            $table->string('alloted_to');
            $table->string('chasis_no');
            $table->string('engine_srno');
            $table->string('vehicle_make');
            $table->string('last_service_record')->nullable(); // Make it nullable
            $table->unsignedInteger('last_service_km')->nullable(); // Make it nullable
            $table->string('last_service_spares'); // Define as enum with allowed values and make it nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
