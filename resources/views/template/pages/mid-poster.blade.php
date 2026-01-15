@extends('template.master')

@section('title', 'Midyear 2026 - Poster')

@section('content')
    <section id="portfolio" class="portfolio section">
        <div class="container mt-5">
            <p class="text-muted text-center"><i>(Click the poster to see registration details and rates)</i></p>
            <a href="{{ route('midyear-registration-deets') }}">
                <img src="images/PSA_MIDYEAR_2026_POSTER.jpg" class="img-fluid animated " alt="">
            </a>
            {{-- <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('midyear-registration') }}"
                target="_blank"
                class="btn btn-primary px-4 py-2 fs-5 fw-bold">
                    MEMBERS REGISTRATION
                </a>
            </div> --}}
        </div>
    </section>
@endsection