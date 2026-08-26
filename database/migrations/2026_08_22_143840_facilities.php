<?php
// database/migrations/2024_01_01_000004_create_facilities_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('category');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('capacity')->nullable();
            $table->string('operating_hours')->nullable();
            $table->enum('status', ['available', 'maintenance', 'unavailable'])->default('available');
            $table->timestamps();
            
            // Index
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};