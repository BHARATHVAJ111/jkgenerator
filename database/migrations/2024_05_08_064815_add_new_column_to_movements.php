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
        Schema::table('movements', function (Blueprint $table) {
            $table->string('customer_name')->nullable();
            $table->string('location')->nullable();
            $table->time('open_hr')->nullable();
            $table->date('open_date')->nullable(); 
            $table->string('last_os_hr')->nullable();
            $table->date('last_os_date')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movements', function (Blueprint $table) {
            //
        });
    }
};
