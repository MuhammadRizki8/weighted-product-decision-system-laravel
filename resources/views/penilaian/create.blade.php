@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Create New Penilaian</h2>
        </div>
    </div>
    <form action="{{ route('penilaians.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id_alternatif" value="{{ $alternatif->id }}">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <strong>Alternatif:</strong>
                <span>{{ $alternatif->nama_alternatif }}</span>
            </div>
            @foreach ($kriterias as $kriteria)
                <div class="col-lg-6 mb-3">
                    <strong>{{ $kriteria->nama_kriteria }}:</strong>
                    <select name="id_opsi[{{ $kriteria->id }}]" class="form-control">
                        @foreach ($opsiKriterias as $opsi)
                            @if ($opsi->id_kriteria == $kriteria->id)
                                <option value="{{ $opsi->id }}">{{ $opsi->opsi }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection