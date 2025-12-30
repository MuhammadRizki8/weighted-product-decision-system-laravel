<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;

class WPController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::with('penilaians.kriteria', 'penilaians.opsi')->get();
        $kriterias = Kriteria::all();
        
        $totalBobot = $kriterias->sum('bobot');
        if ($totalBobot <= 0) {
            return view('wp.index', [
                'hasil' => collect(),
                'kriterias' => $kriterias,
                'nilaiS' => [],
                'nilaiV' => [],
                'totalNilaiS' => 0,
                'normalizedWeights' => [],
                'alternatifs' => $alternatifs,
            ])->with('error', 'Total bobot tidak valid. Pastikan bobot setiap kriteria bernilai positif.');
        }

        // Normalisasi bobot secara positif; terapkan eksponen negatif saat perhitungan untuk tipe cost
        $normalizedWeights = $kriterias->mapWithKeys(function ($kriteria) use ($totalBobot) {
            $w = $kriteria->bobot / $totalBobot; // selalu positif
            return [$kriteria->id => $w];
        });

        // Step-by-step calculations
        $nilaiS = [];
        $nilaiV = [];
        $totalNilaiS = 0;

        foreach ($alternatifs as $alternatif) {
            $sValue = 1;
            foreach ($alternatif->penilaians as $penilaian) {
                if (!isset($normalizedWeights[$penilaian->id_kriteria])) {
                    continue; // kriteria tidak terdaftar
                }
                $base = $penilaian->opsi->nilai;
                // WP mensyaratkan nilai basis > 0. Jika 0 atau null, gunakan epsilon kecil untuk menghindari error
                if ($base === null || $base <= 0) {
                    $base = 1e-9;
                }
                $w = $normalizedWeights[$penilaian->id_kriteria];
                $exp = $penilaian->kriteria->tipe === 'cost' ? -$w : $w;
                $sValue *= pow($base, $exp);
            }
            $nilaiS[$alternatif->id] = $sValue;
            $totalNilaiS += $sValue;
        }

        foreach ($nilaiS as $id => $sValue) {
            $nilaiV[$id] = $totalNilaiS > 0 ? ($sValue / $totalNilaiS) : 0;
        }

        $hasil = $alternatifs->map(function($alternatif) use ($nilaiS, $nilaiV) {
            return [
                'alternatif' => $alternatif,
                'nilaiS' => $nilaiS[$alternatif->id],
                'nilaiV' => $nilaiV[$alternatif->id]
            ];
        })->sortByDesc('nilaiV')->values();

        return view('wp.index', compact('hasil', 'kriterias', 'nilaiS', 'nilaiV', 'totalNilaiS', 'normalizedWeights', 'alternatifs'));
    }
}
