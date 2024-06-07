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
        Schema::table('assigns', function (Blueprint $table) {
            $table->enum('engineer_id', ['1', '2','3','4']); // Define as enum with allowed values
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assigns', function (Blueprint $table) {
            //
        });
    }
};
