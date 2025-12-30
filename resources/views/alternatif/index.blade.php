@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Alternative List</h2>
            <a class="btn btn-success" href="{{ route('alternatifs.create') }}">Create New Alternative</a>
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
                    <option value="nama_alternatif" {{ request('sort') == 'nama_alternatif' ? 'selected' : '' }}>Name</option>
                    <option value="kode_alternatif" {{ request('sort') == 'kode_alternatif' ? 'selected' : '' }}>Code</option>
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
                <a href="{{ route('alternatifs.index') }}" class="btn btn-secondary ml-2">Reset</a>
            </div>
        </div>
    </form>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        @foreach ($alternatifs as $alternatif)
        <div class="col-lg-4 mb-4">
            @include('alternatif_card', ['alternatif' => $alternatif])
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $alternatifs->links() }}
    </div>
</div>
@endsection