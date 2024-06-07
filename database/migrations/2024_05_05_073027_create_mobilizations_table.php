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
        Schema::create('mobilizations', function (Blueprint $table) {
            $table->id();
            $table->string('asset_number')->nullable(); // Nullable column
            $table->string('client_name');
            $table->string('location');
            $table->string('open_hr');
            $table->date('open_date');
            $table->string('last_os_hr')->nullable(); // Nullable column
            $table->date('last_os_date');
            $table->string('movement');
            $table->string('closing_hr');
            $table->date('closing_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobilizations');
    }
};
