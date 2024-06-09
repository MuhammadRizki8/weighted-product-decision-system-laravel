@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Alternatif List</h2>
            <a class="btn btn-success" href="{{ route('alternatifs.create') }}">Create New Alternatif</a>
        </div>
    </div>
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
</div>
@endsection