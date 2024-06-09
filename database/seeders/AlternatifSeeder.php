<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan baris ini

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('alternatifs')->insert([
            ['kode_alternatif' => 'A1', 'nama_alternatif' => 'Hewan Kurban A'],
            ['kode_alternatif' => 'A2', 'nama_alternatif' => 'Hewan Kurban B'],
            ['kode_alternatif' => 'A3', 'nama_alternatif' => 'Hewan Kurban C'],
        ]);
    }
    

}
