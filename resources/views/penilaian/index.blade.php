@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Penilaian List</h2>
            <a class="btn btn-success" href="{{ route('penilaians.create') }}">Create New Penilaian</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Alternatif</th>
                @foreach ($kriterias as $kriteria)
                    <th>{{ $kriteria->nama_kriteria }}</th>
                @endforeach
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $alternatif)
                <tr>
                    <td>{{ $alternatif->nama_alternatif }}</td>
                    @foreach ($kriterias as $kriteria)
                        <td>
                            @if (isset($data[$alternatif->id][$kriteria->id]))
                                {{ $data[$alternatif->id][$kriteria->id]->opsi->opsi }}
                            @else
                                -
                            @endif
                        </td>
                    @endforeach
                    <td>
                        <form action="{{ route('penilaians.destroy', $alternatif->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('penilaians.edit', $alternatif->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection