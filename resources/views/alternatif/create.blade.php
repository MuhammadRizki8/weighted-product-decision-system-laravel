@extends('layouts.app')

@section('title', 'Create New Alternatif')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Create New Alternatif</h2>
        </div>
    </div>
    <form action="{{ route('alternatifs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="kode_alternatif">Kode Alternatif:</label>
                    <input type="text" name="kode_alternatif" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="nama_alternatif">Nama Alternatif:</label>
                    <input type="text" name="nama_alternatif" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            @foreach ($kriterias as $kriteria)
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kriteria_{{ $kriteria->id }}">{{ $kriteria->nama_kriteria }}:</label>
                        <select name="penilaian[{{ $kriteria->id }}][id_opsi]" class="form-control" required>
                            <option value="">-</option> <!-- Nilai default -->
                            @foreach ($kriteria->opsiKriterias as $opsi)
                                <option value="{{ $opsi->id }}">{{ $opsi->opsi }} (Nilai: {{ $opsi->nilai }})</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="penilaian[{{ $kriteria->id }}][id_kriteria]" value="{{ $kriteria->id }}">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('alternatifs.index') }}" class="btn btn-secondary ml-2">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
