<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoToAlternatifsTable extends Migration
{
    public function up()
    {
        Schema::table('alternatifs', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('nama_alternatif');
        });
    }

    public function down()
    {
        Schema::table('alternatifs', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
}