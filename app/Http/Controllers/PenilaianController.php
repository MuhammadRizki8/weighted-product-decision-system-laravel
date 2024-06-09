<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\OpsiKriteria;

class PenilaianController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $penilaians = Penilaian::with(['alternatif', 'kriteria', 'opsi'])->get();
        
        $data = [];
        $kriteria_ids = [];
        
        foreach ($penilaians as $penilaian) {
            $data[$penilaian->id_alternatif][$penilaian->id_kriteria] = $penilaian;
            $kriteria_ids[] = $penilaian->id_kriteria;
        }

        $kriteria_ids = array_unique($kriteria_ids);
        $kriterias = Kriteria::whereIn('id', $kriteria_ids)->get();
        
        return view('penilaian.index', compact('alternatifs', 'kriterias', 'data'));
    }

    public function create(Request $request)
    {
        $alternatif_id = $request->alternatif_id;
        $alternatif = Alternatif::find($alternatif_id);
        $kriterias = Kriteria::all();
        $opsiKriterias = OpsiKriteria::all();
        
        return view('penilaian.create', compact('alternatif', 'kriterias', 'opsiKriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alternatif' => 'required',
            'id_kriteria' => 'required',
            'id_opsi' => 'required',
        ]);

        Penilaian::create($request->all());

        return redirect()->route('penilaians.index')
                         ->with('success', 'Penilaian created successfully.');
    }

    public function edit(Penilaian $penilaian)
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $opsiKriterias = OpsiKriteria::all();
        return view('penilaian.edit', compact('penilaian', 'alternatifs', 'kriterias', 'opsiKriterias'));
    }

    public function update(Request $request, $alternatif_id)
    {
        $request->validate([
            'penilaian.*.id_kriteria' => 'required',
            'penilaian.*.id_opsi' => 'required',
        ]);
    
        foreach ($request->penilaian as $penilaianData) {
            Penilaian::updateOrCreate(
                [
                    'id_alternatif' => $alternatif_id,
                    'id_kriteria' => $penilaianData['id_kriteria']
                ],
                [
                    'id_opsi' => $penilaianData['id_opsi']
                ]
            );
        }
    
        return redirect()->route('alternatifs.show', $alternatif_id)
                         ->with('success', 'Penilaian updated successfully.');
    }
    

    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();

        return redirect()->route('penilaians.index')
                         ->with('success', 'Penilaian deleted successfully.');
    }
}
