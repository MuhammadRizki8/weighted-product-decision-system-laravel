<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $sort = $request->get('sort', 'nama_kriteria');
        $dir = $request->get('dir', 'asc');

        $query = Kriteria::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_kriteria', 'like', "%{$search}%")
                  ->orWhere('kode_kriteria', 'like', "%{$search}%");
            });
        }
        $allowedSorts = ['nama_kriteria', 'kode_kriteria', 'bobot', 'tipe', 'id'];
        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'nama_kriteria';
        }
        $dir = strtolower($dir) === 'desc' ? 'desc' : 'asc';

        $kriterias = $query->orderBy($sort, $dir)->paginate(10)->withQueryString();

        return view('kriteria.index', compact('kriterias', 'search', 'sort', 'dir'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kriteria' => 'required|unique:kriterias,kode_kriteria',
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric|min:0.000001',
            'tipe' => 'required|in:benefit,cost',
        ]);

        Kriteria::create($validated);

        return redirect()->route('kriterias.index')
                         ->with('success', 'Kriteria created successfully.');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $validated = $request->validate([
            'kode_kriteria' => 'required|unique:kriterias,kode_kriteria,' . $kriteria->id,
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric|min:0.000001',
            'tipe' => 'required|in:benefit,cost',
        ]);

        $kriteria->update($validated);

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
