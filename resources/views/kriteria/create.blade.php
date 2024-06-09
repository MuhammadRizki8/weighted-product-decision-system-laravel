@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Add New Kriteria</h2>
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
    <form action="{{ route('kriterias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_kriteria">Kode Kriteria:</label>
            <input type="text" class="form-control" name="kode_kriteria" required>
        </div>
        <div class="form-group">
            <label for="nama_kriteria">Nama Kriteria:</label>
            <input type="text" class="form-control" name="nama_kriteria" required>
        </div>
        <div class="form-group">
            <label for="bobot">Bobot:</label>
            <input type="number" step="1" class="form-control" name="bobot" required>
        </div>
        <div class="form-group">
            <label for="tipe">Tipe:</label>
            <select class="form-control" name="tipe" required>
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>    
</div>
@endsection
