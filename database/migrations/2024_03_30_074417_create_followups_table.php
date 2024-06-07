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
        Schema::create('followups', function (Blueprint $table) {
            $table->id();
            $table->string('source');
            $table->date('enquiry_date');
            $table->string('capacity');
            $table->string('duration');
            $table->string('cost');
            $table->string('company_name');
            $table->string('contact_number', 15);
            $table->string('email_id');
            $table->string('location');
            $table->string('quote_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followups');
    }
};
