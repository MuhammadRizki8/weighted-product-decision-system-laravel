@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Kriteria List</h2>
            <a class="btn btn-success" href="{{ route('kriterias.create') }}">Create New Kriteria</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Kode Kriteria</th>
            <th>Nama Kriteria</th>
            <th>Bobot</th>
            <th>Tipe</th>
            <th width="380px">Action</th>
        </tr>
        @foreach ($kriterias as $kriteria)
        <tr>
            <td>{{ $kriteria->id }}</td>
            <td>{{ $kriteria->kode_kriteria }}</td>
            <td>{{ $kriteria->nama_kriteria }}</td>
            <td>{{ $kriteria->bobot }}</td>
            <td>{{ $kriteria->tipe }}</td>
            <td>
                <form action="{{ route('kriterias.destroy', $kriteria->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('kriterias.edit', $kriteria->id) }}">Edit</a>
                    <a class="btn btn-secondary" href="{{ route('opsi_kriterias.index', $kriteria->id) }}">Atur Opsi</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
