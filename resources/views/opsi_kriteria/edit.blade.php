@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Edit Opsi for {{ $kriteria->nama_kriteria }}</h2>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('opsi_kriterias.update', [$kriteria->id, $opsiKriteria->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Opsi:</strong>
                    <input type="text" name="opsi" value="{{ $opsiKriteria->opsi }}" class="form-control" placeholder="Opsi">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Nilai:</strong>
                    <input type="number" name="nilai" value="{{ $opsiKriteria->nilai }}" class="form-control" placeholder="Nilai">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
