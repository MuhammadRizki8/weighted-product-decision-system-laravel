@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Criteria List</h2>
            <a class="btn btn-success" href="{{ route('kriterias.create') }}">Create New Criteria</a>
        </div>
    </div>
    <form method="GET" class="mb-3">
        <div class="form-row align-items-end">
            <div class="col-sm-6 mb-2">
                <label for="q">Search</label>
                <input type="text" class="form-control" id="q" name="q" value="{{ request('q') }}" placeholder="Search by name or code">
            </div>
            <div class="col-sm-3 mb-2">
                <label for="sort">Sort By</label>
                <select id="sort" name="sort" class="form-control">
                    <option value="nama_kriteria" {{ request('sort') == 'nama_kriteria' ? 'selected' : '' }}>Name</option>
                    <option value="kode_kriteria" {{ request('sort') == 'kode_kriteria' ? 'selected' : '' }}>Code</option>
                    <option value="bobot" {{ request('sort') == 'bobot' ? 'selected' : '' }}>Weight</option>
                    <option value="tipe" {{ request('sort') == 'tipe' ? 'selected' : '' }}>Type</option>
                    <option value="id" {{ request('sort') == 'id' ? 'selected' : '' }}>ID</option>
                </select>
            </div>
            <div class="col-sm-3 mb-2">
                <label for="dir">Order</label>
                <select id="dir" name="dir" class="form-control">
                    <option value="asc" {{ request('dir') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('dir') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Apply</button>
                <a href="{{ route('kriterias.index') }}" class="btn btn-secondary ml-2">Reset</a>
            </div>
        </div>
    </form>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped table-bordered">
        <caption>Criteria table</caption>
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Kode Kriteria</th>
                <th scope="col">Nama Kriteria</th>
                <th scope="col">Bobot</th>
                <th scope="col">Tipe</th>
                <th width="380px">Action</th>
            </tr>
        </thead>
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
    <div class="d-flex justify-content-center">
        {{ $kriterias->links() }}
    </div>
</div>
@endsection
