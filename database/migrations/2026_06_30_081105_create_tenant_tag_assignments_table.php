<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenant_tag_assignments', function (Blueprint $table) {
            $table->foreignUuid('tag_id')->references('id')->on('tenant_tags')->onDelete('cascade');
            $table->foreignUuid('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamp('assigned_at')->useCurrent();

            $table->primary(['tag_id', 'student_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenant_tag_assignments');
    }
};