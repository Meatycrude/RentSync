<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenant_tags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('landlord_id')->references('id')->on('landlords')->onDelete('cascade');
            $table->string('label', 100);
            $table->string('color', 7)->nullable();

            $table->unique(['landlord_id', 'label']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenant_tags');
    }
};