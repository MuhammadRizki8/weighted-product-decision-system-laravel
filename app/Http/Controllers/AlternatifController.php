<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Storage;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::with('penilaians.kriteria', 'penilaians.opsi')->get();
        return view('alternatif.index', compact('alternatifs'));
    }
    public function show(Alternatif $alternatif)
    {
        return view('alternatif.show', compact('alternatif'));
    }
    
    public function create()
    {
        $kriterias = Kriteria::all();
        return view('alternatif.create', compact('kriterias'));
    }

    
    public function edit(Alternatif $alternatif)
    {
        $kriterias = Kriteria::all();
        return view('alternatif.edit', compact('alternatif', 'kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'penilaian.*.id_kriteria' => 'required',
            'penilaian.*.id_opsi' => 'required',
        ]);

        $data = $request->only(['kode_alternatif', 'nama_alternatif']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $alternatif = Alternatif::create($data);

        foreach ($request->penilaian as $penilaian) {
            $penilaian['id_alternatif'] = $alternatif->id;
            Penilaian::create($penilaian);
        }

        return redirect()->route('alternatifs.index')
                        ->with('success', 'Alternatif created successfully.');
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['kode_alternatif', 'nama_alternatif']);

        if ($request->hasFile('foto')) {
            if ($alternatif->foto) {
                Storage::disk('public')->delete($alternatif->foto);
            }
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $alternatif->update($data);

        return redirect()->route('alternatifs.index')
                        ->with('success', 'Alternatif updated successfully.');
    }

    public function destroy(Alternatif $alternatif)
    {
        // Menghapus penilaian terkait dengan alternatif
        $alternatif->penilaians()->delete();
    
        // Menghapus foto jika ada
        if ($alternatif->foto) {
            Storage::disk('public')->delete($alternatif->foto);
        }
    
        // Menghapus alternatif
        $alternatif->delete();
    
        return redirect()->route('alternatifs.index')
                         ->with('success', 'Alternatif deleted successfully.');
    }
    public function editPenilaian(Alternatif $alternatif)
    {
        $kriterias = Kriteria::all();
        $penilaians = Penilaian::where('id_alternatif', $alternatif->id)->get();
        return view('penilaian.edit', compact('alternatif', 'kriterias', 'penilaians'));
    }
    

}