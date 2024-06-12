@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Edit Kriteria</h2>
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
    <form action="{{ route('kriterias.update',$kriteria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kode_kriteria">Kode Kriteria:</label>
            <input type="text" class="form-control" name="kode_kriteria" value="{{ $kriteria->kode_kriteria }}" required>
        </div>
        <div class="form-group">
            <label for="nama_kriteria">Nama Kriteria:</label>
            <input type="text" class="form-control" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}" required>
        </div>
        <div class="form-group">
            <label for="bobot">Bobot:</label>
            <input type="number" step="0.01" class="form-control" name="bobot" value="{{ $kriteria->bobot }}" required>
        </div>
        <div class="form-group">
            <label for="tipe">Tipe:</label>
            <select class="form-control" name="tipe" required>
                <option value="benefit" {{ $kriteria->tipe == 'benefit' ? 'selected' : '' }}>Benefit</option>
                <option value="cost" {{ $kriteria->tipe == 'cost' ? 'selected' : '' }}>Cost</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kriterias.index') }}" class="btn btn-secondary ml-2">Back</a>
    </form>
</div>
@endsection
