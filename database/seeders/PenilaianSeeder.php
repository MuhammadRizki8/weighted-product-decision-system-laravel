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
            ['id_alternatif' => 1, 'id_kriteria' => 2, 'id_opsi' => 5],
            ['id_alternatif' => 1, 'id_kriteria' => 3, 'id_opsi' => 8],
            ['id_alternatif' => 1, 'id_kriteria' => 4, 'id_opsi' => 10],
            ['id_alternatif' => 1, 'id_kriteria' => 5, 'id_opsi' => 13],
            ['id_alternatif' => 1, 'id_kriteria' => 6, 'id_opsi' => 14],
            ['id_alternatif' => 1, 'id_kriteria' => 7, 'id_opsi' => 16],
            
            ['id_alternatif' => 2, 'id_kriteria' => 1, 'id_opsi' => 3],
            ['id_alternatif' => 2, 'id_kriteria' => 2, 'id_opsi' => 6],
            ['id_alternatif' => 2, 'id_kriteria' => 3, 'id_opsi' => 7],
            ['id_alternatif' => 2, 'id_kriteria' => 4, 'id_opsi' => 10],
            ['id_alternatif' => 2, 'id_kriteria' => 5, 'id_opsi' => 12],
            ['id_alternatif' => 2, 'id_kriteria' => 6, 'id_opsi' => 14],
            ['id_alternatif' => 2, 'id_kriteria' => 7, 'id_opsi' => 17],
            
            ['id_alternatif' => 3, 'id_kriteria' => 1, 'id_opsi' => 2],
            ['id_alternatif' => 3, 'id_kriteria' => 2, 'id_opsi' => 6],
            ['id_alternatif' => 3, 'id_kriteria' => 3, 'id_opsi' => 7],
            ['id_alternatif' => 3, 'id_kriteria' => 4, 'id_opsi' => 10],
            ['id_alternatif' => 3, 'id_kriteria' => 5, 'id_opsi' => 13],
            ['id_alternatif' => 3, 'id_kriteria' => 6, 'id_opsi' => 15],
            ['id_alternatif' => 3, 'id_kriteria' => 7, 'id_opsi' => 16],
            
            ['id_alternatif' => 4, 'id_kriteria' => 1, 'id_opsi' => 1],
            ['id_alternatif' => 4, 'id_kriteria' => 2, 'id_opsi' => 5],
            ['id_alternatif' => 4, 'id_kriteria' => 3, 'id_opsi' => 7],
            ['id_alternatif' => 4, 'id_kriteria' => 4, 'id_opsi' => 10],
            ['id_alternatif' => 4, 'id_kriteria' => 5, 'id_opsi' => 12],
            ['id_alternatif' => 4, 'id_kriteria' => 6, 'id_opsi' => 14],
            ['id_alternatif' => 4, 'id_kriteria' => 7, 'id_opsi' => 16],
            
            ['id_alternatif' => 5, 'id_kriteria' => 1, 'id_opsi' => 3],
            ['id_alternatif' => 5, 'id_kriteria' => 2, 'id_opsi' => 6],
            ['id_alternatif' => 5, 'id_kriteria' => 3, 'id_opsi' => 7],
            ['id_alternatif' => 5, 'id_kriteria' => 4, 'id_opsi' => 9],
            ['id_alternatif' => 5, 'id_kriteria' => 5, 'id_opsi' => 13],
            ['id_alternatif' => 5, 'id_kriteria' => 6, 'id_opsi' => 15],
            ['id_alternatif' => 5, 'id_kriteria' => 7, 'id_opsi' => 18],
        ]);
    }
}
