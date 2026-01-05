@extends('template.master')

@section('title', 'Midyear 2026 - Registration')

@section('content')
    <section id="portfolio" class="portfolio section">
        <div class="container mt-5">
            @if (session('success'))
                    <div class="alert alert-success mt-4 text-center justify-content-center">
                        {{ session('success') }}
                    </div>
                @endif
            <img src="images/PSA MIDYEAR 2026 RATES.jpg" class="img-fluid animated " alt="">
            
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('midyear-registration') }}"
                target="_blank"
                class="btn btn-primary px-4 py-2 fs-5 fw-bold">
                    MEMBERS REGISTRATION
                </a>
            </div>
        </div>
    </section>
@endsection