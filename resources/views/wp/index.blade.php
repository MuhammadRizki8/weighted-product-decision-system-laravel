@extends('layouts.app')

@section('title', 'Perhitungan Weighted Product (WP)')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Perhitungan Weighted Product (WP)</h2>
    
    <!-- Tampilkan bobot normalisasi -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Bobot Normalisasi</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->nama_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($normalizedWeights as $weight)
                            <td>{{ number_format($weight, 4) }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tampilkan Matriks Alternatif x Kriteria -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Matriks Alternatif x Kriteria</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Alternatif</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->nama_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alternatif)
                        <tr>
                            <td>{{ $alternatif->nama_alternatif }}</td>
                            @foreach ($kriterias as $kriteria)
                                @php
                                    $nilai = $alternatif->penilaians->firstWhere('id_kriteria', $kriteria->id)->opsi->nilai ?? 0;
                                @endphp
                                <td>{{ $nilai }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tampilkan Perhitungan Nilai S -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Perhitungan Nilai S</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Alternatif</th>
                        <th>Nilai S</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $data)
                        <tr>
                            <td>{{ $data['alternatif']->nama_alternatif }}</td>
                            <td>{{ number_format($data['nilaiS'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tampilkan Perhitungan Nilai V -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Perhitungan Nilai V</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Alternatif</th>
                        <th>Nilai V</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $data)
                        <tr>
                            <td>{{ $data['alternatif']->nama_alternatif }}</td>
                            <td>{{ number_format($data['nilaiV'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tampilkan Peringkat -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Peringkat</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Peringkat</th>
                        <th>Alternatif</th>
                        <th>Nilai V</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data['alternatif']->nama_alternatif }}</td>
                            <td>{{ number_format($data['nilaiV'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
