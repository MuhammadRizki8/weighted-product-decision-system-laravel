<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('kriterias')->insert([
            ['kode_kriteria' => 'C1', 'nama_kriteria' => 'Umur', 'bobot' => 0.2, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C2', 'nama_kriteria' => 'Berat', 'bobot' => 0.15, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C3', 'nama_kriteria' => 'Kesehatan', 'bobot' => 0.25, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C4', 'nama_kriteria' => 'Harga', 'bobot' => 0.1, 'tipe' => 'cost'],
            ['kode_kriteria' => 'C5', 'nama_kriteria' => 'Lingkungan', 'bobot' => 0.15, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C6', 'nama_kriteria' => 'Perawatan Hewan Kurban', 'bobot' => 0.1, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C7', 'nama_kriteria' => 'Metode Pembayaran', 'bobot' => 0.05, 'tipe' => 'benefit'],
        ]);
    }
    
}
