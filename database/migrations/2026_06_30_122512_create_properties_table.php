<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('landlord_id')->references('id')->on('landlords')->onDelete('cascade');
            $table->foreignUuid('institution_id')->nullable()->references('id')->on('institutions');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->integer('distance_to_campus_m')->nullable();
            $table->integer('walk_time_min')->nullable();
            $table->boolean('has_water')->default(true);
            $table->boolean('has_internet')->default(false);
            $table->unsignedTinyInteger('security_rating')->nullable();
            $table->string('verification_status', 20)->default('unverified');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('landlord_id');
            $table->index(['latitude', 'longitude']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};