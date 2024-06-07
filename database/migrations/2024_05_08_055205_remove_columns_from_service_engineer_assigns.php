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
            $table->dropColumn('customer_name');
            $table->dropColumn('location');
            $table->dropColumn('open_hr');
            $table->dropColumn('open_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_engineer_assigns', function (Blueprint $table) {
            //
        });
    }
};
