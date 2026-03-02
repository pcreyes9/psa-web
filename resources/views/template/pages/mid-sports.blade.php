@extends('template.master')

@section('title', 'Midyear 2026 - Pickleball Tournament')

@section('content')
    <section id="portfolio" class="portfolio section">
        <div class="container text-center mt-5">
            {{-- <p class="text-muted text-center"><i>(Click the poster to see registration details and rates)</i></p> --}}
            <a href="{{ route('midyear-registration-deets') }}">
                <img src="images/Pickleball_Tournament.jpg" class="img-fluid animated " alt="">
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