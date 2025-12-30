<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            // Ensure unique pair of (id_alternatif, id_kriteria)
            $table->unique(['id_alternatif', 'id_kriteria'], 'penilaians_alternatif_kriteria_unique');
        });
    }

    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->dropUnique('penilaians_alternatif_kriteria_unique');
        });
    }
};
