@extends('layouts.app')

@section('title', 'Perhitungan Weighted Product (WP)')

@section('content')
<div class="container mt-3 my-3">
    <h2 class="mb-3 text-center">Perhitungan Weighted Product (WP)</h2>
    
    <!-- Tampilkan Peringkat -->
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="text-dark">Peringkat</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Peringkat</th>
                        <th>Alternatif</th>
                        <th>Nilai V</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $index => $data)
                        <tr class="ranking-row">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data['alternatif']->nama_alternatif }}</td>
                            <td>{{ number_format($data['nilaiV'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tampilkan Detail Perhitungan dalam Dropdown -->
    <div class="accordion" id="accordionExample">
        <!-- Bobot Normalisasi -->
        <div class="card mb-2">
            <div class="card-header" id="headingOne">
                <h4 class="mb-0">
                    <button class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Bobot Normalisasi <i class="fas fa-chevron-down ml-auto"></i>
                    </button>
                </h4>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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
        </div>

        <!-- Matriks Alternatif x Kriteria -->
        <div class="card mb-2">
            <div class="card-header" id="headingTwo">
                <h4 class="mb-0">
                    <button class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Matriks Alternatif x Kriteria <i class="fas fa-chevron-down ml-auto"></i>
                    </button>
                </h4>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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
        </div>

        <!-- Perhitungan Nilai S -->
        <div class="card mb-2">
            <div class="card-header" id="headingThree">
                <h4 class="mb-0">
                    <button class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Perhitungan Nilai S <i class="fas fa-chevron-down ml-auto"></i>
                    </button>
                </h4>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
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
        </div>

        <!-- Perhitungan Nilai V -->
        <div class="card mb-2">
            <div class="card-header" id="headingFour">
                <h4 class="mb-0">
                    <button class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Perhitungan Nilai V <i class="fas fa-chevron-down ml-auto"></i>
                    </button>
                </h4>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
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
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Increase chart responsiveness */
    #rankingChart {
        width: 100% !important;
    }
    .thead-dark th { color: #fff; }
    table caption { caption-side: top; }
    .ranking-row td { vertical-align: middle; }
    .card .table { margin-bottom: 0; }
    .table td, .table th { text-align: center; }
    .table th[scope="col"] { text-transform: uppercase; font-size: 0.85rem; }
    .table caption { font-weight: 600; }
    .btn-link { text-decoration: none; }
    .btn-link:hover { text-decoration: underline; }
    .accordion .card-header { cursor: pointer; }
    .accordion .card-header .btn-link { width: 100%; }
    .accordion .card-header .fas { transition: transform 0.3s ease; }
    .accordion .card-header .collapsed .fas { transform: rotate(180deg); }
    @media (max-width: 576px) {
        .table { font-size: 0.9rem; }
    }
}</style>
@endsection

@section('content')
@parent
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    (function() {
        const labels = [
            @foreach ($hasil as $data)
                @php $name = addslashes($data['alternatif']->nama_alternatif); @endphp
                "{{ $name }}",
            @endforeach
        ];
        const values = [
            @foreach ($hasil as $data)
                {{ round($data['nilaiV'], 6) }},
            @endforeach
        ];
        const ctx = document.getElementById('rankingChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(99, 102, 241, 0.8)'); // indigo
        gradient.addColorStop(1, 'rgba(99, 102, 241, 0.2)');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nilai V',
                    data: values,
                    backgroundColor: gradient,
                    borderColor: 'rgba(99, 102, 241, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const v = context.raw;
                                return 'Nilai V: ' + Number(v).toFixed(4);
                            }
                        }
                    }
                },
                scales: {
                    x: { title: { display: true, text: 'Alternatif' } },
                    y: { title: { display: true, text: 'Nilai V' }, beginAtZero: true }
                }
            }
        });
    })();
</script>
@endsection
