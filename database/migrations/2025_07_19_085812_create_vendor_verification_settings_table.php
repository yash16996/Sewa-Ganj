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
        Schema::create('vendor_verification_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('id_verification')->default(0)->nullable();
            $table->boolean('pan_verification')->default(0)->nullable();
            $table->boolean('irc_verification')->default(0)->nullable(); // उद्योग दर्ता प्रमाण पत्र (Industry Registration Certificate)
            $table->text('instructions')->nullable();
            $table->boolean('auto_approve')->default(0)->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_verification_settings');
    }
};
