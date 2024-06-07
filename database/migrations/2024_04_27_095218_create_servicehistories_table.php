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
        Schema::create('servicehistories', function (Blueprint $table) {
            $table->id();
            $table->string('asset_number')->nullable();
            $table->string('general')->nullable();
            $table->string('repair_work')->nullable();
            $table->string('last_os_service')->nullable();
            $table->string('mobilization')->nullable();
            $table->string('demobilization')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicehistories');
    }
};
