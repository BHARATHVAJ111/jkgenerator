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
        Schema::table('service_engineer_assigns', function (Blueprint $table) {
            $table->string('customer_name')->nullable();
            $table->string('location')->nullable();
            $table->time('open_hr');
            $table->date('open_date')->nullable(); // Make open_date nullable
            $table->time('last_os_hr');
            $table->date('last_os_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_engineer_assigns', function (Blueprint $table) {
            $table->dropColumn('customer_name');
            $table->dropColumn('location');
            $table->dropColumn('open_hr');
            $table->dropColumn('open_date');
            $table->dropColumn('last_os_hr');
            $table->dropColumn('last_os_date');
        });
    }
};
