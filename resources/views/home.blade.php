@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Jumbotron -->
    <div class="jumbotron mt-4 text-center">
        <h1 class="display-4">Welcome!</h1>
        <p class="lead">This decision support system website using the weighted product method will help you choose qurban animals.</p>
        <hr class="my-4">
        <img src="{{ asset('qurban.png') }}" class="img-fluid" alt="Qurban Image">
        <p class="mt-4">Let's choose your qurban animal. With the best qurban animals, every charity becomes more meaningful.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('wp.index') }}" role="button">View Ranking</a>
    </div>
@endsection

@section('styles')
<style>
    .jumbotron {
        background-color: #f8f9fa;
        padding: 2rem 1rem;
        margin-bottom: 2rem;
        border-radius: 0.3rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .jumbotron .display-4 {
        font-size: 2.5rem;
        font-weight: 300;
        margin-bottom: 1rem;
        color: #343a40;
    }

    .jumbotron .lead {
        font-size: 1.25rem;
        font-weight: 300;
        color: #6c757d;
        margin-bottom: 1.5rem;
    }

    .jumbotron hr {
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        width: 60%;
        margin: 1.5rem auto;
    }

    .jumbotron img {
        max-width: 100%;
        height: auto;
        margin-bottom: 1.5rem;
        border-radius: 0.3rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-size: 1.125rem;
        padding: 0.75rem 1.25rem;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
@endsection
