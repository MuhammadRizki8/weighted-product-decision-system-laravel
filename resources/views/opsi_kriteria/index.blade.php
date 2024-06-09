@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Opsi Kriteria for {{ $kriteria->nama_kriteria }}</h2>
            <a class="btn btn-success" href="{{ route('opsi_kriterias.create', $kriteria->id) }}">Create New Opsi</a>
            <a class="btn btn-secondary" href="{{ route('kriterias.index') }}">Back to Kriteria List</a>
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
            <th>Opsi</th>
            <th>Nilai</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($opsi_kriterias as $opsi)
        <tr>
            <td>{{ $opsi->id }}</td>
            <td>{{ $opsi->opsi }}</td>
            <td>{{ $opsi->nilai }}</td>
            <td>
                <form action="{{ route('opsi_kriterias.destroy', [$kriteria->id, $opsi->id]) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('opsi_kriterias.edit', [$kriteria->id, $opsi->id]) }}">Edit</a>
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
