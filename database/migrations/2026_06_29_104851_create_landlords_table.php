<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landlords', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->unique()->references('id')->on('users')->onDelete('cascade');
            $table->string('business_name')->nullable();
            $table->string('national_id', 50)->nullable();
            $table->string('verification_status', 20)->default('unverified');
            $table->timestamp('verified_at')->nullable();
            $table->foreignUuid('subscription_plan_id')->nullable()->references('id')->on('subscription_plans');
            $table->string('subscription_status', 20)->default('trial');
            $table->timestamp('trial_ends_at')->nullable();
            $table->string('mpesa_paybill', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landlords');
    }
};