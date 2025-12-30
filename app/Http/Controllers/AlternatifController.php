<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ProcessAlternatifImage;

class AlternatifController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $sort = $request->get('sort', 'nama_alternatif');
        $dir = $request->get('dir', 'asc');

        $query = Alternatif::with('penilaians.kriteria', 'penilaians.opsi');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_alternatif', 'like', "%{$search}%")
                  ->orWhere('kode_alternatif', 'like', "%{$search}%");
            });
        }
        // Whitelist sortable columns
        $allowedSorts = ['nama_alternatif', 'kode_alternatif', 'id'];
        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'nama_alternatif';
        }
        $dir = strtolower($dir) === 'desc' ? 'desc' : 'asc';

        $alternatifs = $query->orderBy($sort, $dir)->paginate(9)->withQueryString();

        return view('alternatif.index', compact('alternatifs', 'search', 'sort', 'dir'));
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
        $validated = $request->validate([
            'kode_alternatif' => 'required|unique:alternatifs,kode_alternatif',
            'nama_alternatif' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'penilaian.*.id_kriteria' => 'required',
            'penilaian.*.id_opsi' => 'required',
        ]);

        $data = [
            'kode_alternatif' => $validated['kode_alternatif'],
            'nama_alternatif' => $validated['nama_alternatif'],
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        DB::transaction(function () use (&$alternatif, $data, $validated) {
            $alternatif = Alternatif::create($data);
            foreach ($validated['penilaian'] as $penilaian) {
                Penilaian::create([
                    'id_alternatif' => $alternatif->id,
                    'id_kriteria' => $penilaian['id_kriteria'],
                    'id_opsi' => $penilaian['id_opsi'],
                ]);
            }
        });

        // Process thumbnail after commit if a photo was uploaded
        if (!empty($data['foto']) && isset($alternatif)) {
            DB::afterCommit(function () use ($alternatif) {
                ProcessAlternatifImage::dispatch($alternatif->id);
            });
        }

        return redirect()->route('alternatifs.index')
                        ->with('success', 'Alternatif created successfully.');
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $validated = $request->validate([
            'kode_alternatif' => 'required|unique:alternatifs,kode_alternatif,' . $alternatif->id,
            'nama_alternatif' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'kode_alternatif' => $validated['kode_alternatif'],
            'nama_alternatif' => $validated['nama_alternatif'],
        ];

        if ($request->hasFile('foto')) {
            if ($alternatif->foto) {
                Storage::disk('public')->delete($alternatif->foto);
            }
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $alternatif->update($data);

        // Re-generate thumbnail if a new photo uploaded
        if ($request->hasFile('foto')) {
            DB::afterCommit(function () use ($alternatif) {
                ProcessAlternatifImage::dispatch($alternatif->id);
            });
        }

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