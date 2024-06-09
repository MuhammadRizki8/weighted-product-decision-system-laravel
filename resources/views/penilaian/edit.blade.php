@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Edit Penilaian Kriteria untuk {{ $alternatif->nama_alternatif }}</h2>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('penilaians.update', $alternatif->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            @foreach ($kriterias as $index => $kriteria)
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="penilaian_{{ $kriteria->id }}">{{ $kriteria->nama_kriteria }}:</label>
                        <select class="form-control" id="penilaian_{{ $kriteria->id }}" name="penilaian[{{ $kriteria->id }}][id_opsi]">
                            @foreach ($kriteria->opsiKriterias as $opsi)
                                <option value="{{ $opsi->id }}" 
                                    @foreach ($penilaians as $penilaian)
                                        @if ($penilaian->id_kriteria == $kriteria->id && $penilaian->id_opsi == $opsi->id)
                                            selected
                                        @endif
                                    @endforeach
                                >
                                    {{ $opsi->opsi }} (Nilai: {{ $opsi->nilai }})
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="penilaian[{{ $kriteria->id }}][id_kriteria]" value="{{ $kriteria->id }}">
                    </div>
                </div>
                @if (($index + 1) % 2 == 0)
                    </div><div class="row">
                @endif
            @endforeach
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('alternatifs.show', $alternatif->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
