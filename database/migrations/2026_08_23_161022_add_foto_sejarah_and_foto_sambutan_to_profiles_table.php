<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            // Hanya tambahkan foto_sambutan jika belum ada
            if (!Schema::hasColumn('profiles', 'foto_sambutan')) {
                $table->string('foto_sambutan')->nullable()->after('foto_sejarah');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            if (Schema::hasColumn('profiles', 'foto_sambutan')) {
                $table->dropColumn('foto_sambutan');
            }
        });
    }
};