<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric',
            'tipe' => 'required',
        ]);
    
        Kriteria::create($request->all());
    
        return redirect()->route('kriterias.index')
                         ->with('success', 'Kriteria created successfully.');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric',
            'tipe' => 'required',
        ]);

        $kriteria->update($request->all());

        return redirect()->route('kriterias.index')
                         ->with('success', 'Kriteria updated successfully.');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();

        return redirect()->route('kriterias.index')
                         ->with('success', 'Kriteria deleted successfully.');
    }

    
}
