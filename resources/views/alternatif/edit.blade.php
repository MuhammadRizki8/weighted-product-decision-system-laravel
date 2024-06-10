@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Edit Alternatif</h2>
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

    <form action="{{ route('alternatifs.update', $alternatif->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Kode Alternatif:</strong>
                    <input type="text" name="kode_alternatif" value="{{ $alternatif->kode_alternatif }}" class="form-control" placeholder="Kode Alternatif">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Nama Alternatif:</strong>
                    <input type="text" name="nama_alternatif" value="{{ $alternatif->nama_alternatif }}" class="form-control" placeholder="Nama Alternatif">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Foto Alternatif:</strong>
                    <input type="file" name="foto" class="form-control">
                    @if ($alternatif->foto)
                        <img src="{{ asset('storage/' . $alternatif->foto) }}" alt="{{ $alternatif->nama_alternatif }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('alternatifs.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
