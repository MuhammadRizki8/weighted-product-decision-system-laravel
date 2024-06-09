<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpsiKriteria;
use App\Models\Kriteria;

class OpsiKriteriaController extends Controller
{
    public function index($kriteria_id)
    {
        $kriteria = Kriteria::find($kriteria_id);
        $opsi_kriterias = OpsiKriteria::where('id_kriteria', $kriteria_id)->get();
        return view('opsi_kriteria.index', compact('kriteria', 'opsi_kriterias'));
    }

    public function create($kriteria_id)
    {
        $kriteria = Kriteria::find($kriteria_id);
        return view('opsi_kriteria.create', compact('kriteria'));
    }

    public function store(Request $request, $kriteria_id)
    {
        $request->validate([
            'opsi' => 'required',
            'nilai' => 'required|integer',
        ]);

        OpsiKriteria::create([
            'opsi' => $request->opsi,
            'nilai' => $request->nilai,
            'id_kriteria' => $kriteria_id,
        ]);

        return redirect()->route('opsi_kriterias.index', $kriteria_id)
                         ->with('success', 'Opsi Kriteria created successfully.');
    }

    public function edit($kriteria_id, OpsiKriteria $opsiKriteria)
    {
        $kriteria = Kriteria::find($kriteria_id);
        return view('opsi_kriteria.edit', compact('kriteria', 'opsiKriteria'));
    }

    public function update(Request $request, $kriteria_id, OpsiKriteria $opsiKriteria)
    {
        $request->validate([
            'opsi' => 'required',
            'nilai' => 'required|integer',
        ]);

        $opsiKriteria->update($request->all());

        return redirect()->route('opsi_kriterias.index', $kriteria_id)
                         ->with('success', 'Opsi Kriteria updated successfully.');
    }

    public function destroy($kriteria_id, OpsiKriteria $opsiKriteria)
    {
        $opsiKriteria->delete();

        return redirect()->route('opsi_kriterias.index', $kriteria_id)
                         ->with('success', 'Opsi Kriteria deleted successfully.');
    }
}
