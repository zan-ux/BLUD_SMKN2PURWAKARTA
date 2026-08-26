<?php
// database/migrations/2024_01_01_000003_create_organigrams_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organigrams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('position');
            $table->string('department');
            $table->foreignId('parent_id')->nullable()->constrained('organigrams')->onDelete('set null');
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->integer('order_number')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organigrams');
    }
};