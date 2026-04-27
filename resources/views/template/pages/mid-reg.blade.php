@extends('template.master')

@section('title', 'Midyear 2026 - Registration Details')

@section('content')
    <section id="portfolio" class="portfolio section">
        <div class="container mt-5">
            @if (session('success'))
                <div class="alert alert-success mt-4 text-center justify-content-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row my-4 pt-5 justify-content-center">
                <div class="col-md-4 mb-2">
                    <a href="{{ route('midyear-registration') }}"
                        target="_blank"
                        class="btn btn-primary w-100 px-4 py-2 fs-5 fw-bold text-center">
                        Convention Registration
                    </a>
                </div>

                <div class="col-md-4 mb-2">
                    <a href="{{ route('workshop-registration') }}"
                        target="_blank"
                        class="btn btn-primary w-100 px-4 py-2 fs-5 fw-bold text-center">
                        Workshp Registration
                    </a>
                </div>
            </div>

           <div class="my-4 text-center">
                <a href="{{ route('midyear-registration') }}" class="d-inline-block w-100">
                    <img src="images/PSA MIDYEAR 2026 RATES.png"
                        class="img-fluid w-100"
                        style="max-width: 1100px; margin: auto; display: block;"
                        alt="PSA Midyear 2026 Rates">
                </a>
            </div>
        </div>
    </section>
@endsection