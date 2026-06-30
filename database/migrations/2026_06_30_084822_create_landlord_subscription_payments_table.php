<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landlord_subscription_payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('landlord_id')->references('id')->on('landlords')->onDelete('cascade');
            $table->foreignUuid('plan_id')->references('id')->on('subscription_plans');
            $table->unsignedInteger('amount_kes');
            $table->string('mpesa_receipt', 50)->nullable();
            $table->date('period_start');
            $table->date('period_end');
            $table->timestamp('paid_at')->nullable();

            $table->index('landlord_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landlord_subscription_payments');
    }
};