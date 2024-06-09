<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('penilaians')->insert([
            ['id_alternatif' => 1, 'id_kriteria' => 1, 'id_opsi' => 2],
            ['id_alternatif' => 1, 'id_kriteria' => 2, 'id_opsi' => 2],
            ['id_alternatif' => 1, 'id_kriteria' => 3, 'id_opsi' => 1],
            ['id_alternatif' => 1, 'id_kriteria' => 4, 'id_opsi' => 1],
            ['id_alternatif' => 1, 'id_kriteria' => 5, 'id_opsi' => 1],
            ['id_alternatif' => 1, 'id_kriteria' => 6, 'id_opsi' => 1],
            ['id_alternatif' => 1, 'id_kriteria' => 7, 'id_opsi' => 1],
            ['id_alternatif' => 2, 'id_kriteria' => 1, 'id_opsi' => 1],
            ['id_alternatif' => 2, 'id_kriteria' => 2, 'id_opsi' => 3],
            ['id_alternatif' => 2, 'id_kriteria' => 3, 'id_opsi' => 1],
            ['id_alternatif' => 2, 'id_kriteria' => 4, 'id_opsi' => 2],
            ['id_alternatif' => 2, 'id_kriteria' => 5, 'id_opsi' => 2],
            ['id_alternatif' => 2, 'id_kriteria' => 6, 'id_opsi' => 2],
            ['id_alternatif' => 2, 'id_kriteria' => 7, 'id_opsi' => 2],
            ['id_alternatif' => 3, 'id_kriteria' => 1, 'id_opsi' => 3],
            ['id_alternatif' => 3, 'id_kriteria' => 2, 'id_opsi' => 1],
            ['id_alternatif' => 3, 'id_kriteria' => 3, 'id_opsi' => 2],
            ['id_alternatif' => 3, 'id_kriteria' => 4, 'id_opsi' => 3],
            ['id_alternatif' => 3, 'id_kriteria' => 5, 'id_opsi' => 3],
            ['id_alternatif' => 3, 'id_kriteria' => 6, 'id_opsi' => 3],
            ['id_alternatif' => 3, 'id_kriteria' => 7, 'id_opsi' => 1],
        ]);
    }
    
}
