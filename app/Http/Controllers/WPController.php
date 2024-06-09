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
        $normalizedWeights = $kriterias->mapWithKeys(function($kriteria) use ($totalBobot) {
            return [$kriteria->id => $kriteria->bobot / $totalBobot];
        });

        // Step-by-step calculations
        $nilaiS = [];
        $nilaiV = [];
        $totalNilaiS = 0;

        foreach ($alternatifs as $alternatif) {
            $sValue = 1;
            foreach ($alternatif->penilaians as $penilaian) {
                $sValue *= pow($penilaian->opsi->nilai, $normalizedWeights[$penilaian->id_kriteria]);
            }
            $nilaiS[$alternatif->id] = $sValue;
            $totalNilaiS += $sValue;
        }

        foreach ($nilaiS as $id => $sValue) {
            $nilaiV[$id] = $sValue / $totalNilaiS;
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
