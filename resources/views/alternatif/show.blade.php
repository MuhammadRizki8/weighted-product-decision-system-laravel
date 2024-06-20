@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3 my-3">
        <div class="card-header">
            <h5 class="text-dark">Alternative Detail</h5>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $alternatif->nama_alternatif }}</h5>
            <p class="card-text">Kode: {{ $alternatif->kode_alternatif }}</p>
            <img src="{{ asset('storage/' . $alternatif->foto) }}" alt="{{ $alternatif->nama_alternatif }}" class="img-fluid" style="max-width: 300px;">
            <h6 class="mt-4">Nilai Kriteria:</h6>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Kriteria</th>
                        <th>Nilai</th>
                        <th>Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatif->penilaians as $penilaian)
                        <tr>
                            <td>{{ $penilaian->kriteria->nama_kriteria }}</td>
                            <td>{{ $penilaian->opsi->opsi }}</td>
                            <td>{{ $penilaian->opsi->nilai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Tambahkan informasi lainnya yang Anda ingin tampilkan -->
            <a href="{{ route('alternatifs.index') }}" class="btn btn-secondary mt-3">Back</a>
            <a href="{{ route('alternatifs.edit_penilaian', $alternatif->id) }}" class="btn btn-primary mt-3">Edit Penilaian Kriteria</a>
        </div>
    </div>
</div>
@endsection
