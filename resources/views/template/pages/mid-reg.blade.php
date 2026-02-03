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
            <div class="my-4">
                <a href="{{ route('midyear-registration') }}"
                target="_blank"
                class="btn btn-primary w-100 px-4 py-2 fs-5 fw-bold text-center"
                style="max-width: 520px; margin: auto; display: block;">
                    Click here to register for Midyear Convention 2026
                </a>
            </div>

           <div class="my-4 text-center">
                <a href="{{ route('midyear-registration') }}" class="d-inline-block w-100">
                    <img src="images/PSA MIDYEAR 2026 RATES.png"
                        class="img-fluid w-100"
                        style="max-width: 1100px; margin: auto; display: block;"
                        alt="PSA Midyear 2026 Rates">
                </a>
            </div>

            {{-- <div class="row gy-4 my-4">
                <h3 class="">
                    Bank Details for Payment
                </h3>
                <div class="col-md-6">
                    <p class="mod">
                        <strong>BPI</strong>
                        <br>
                        Account Name: Philippine Society of Anesthesiologists, Inc.
                        <br>
                        Account Number: 4433 1136 03
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="mod">
                        <strong>LandBank</strong>
                        <br>
                        Account Name: Philippine Society of Anesthesiologists, Inc.
                        <br>
                        Account Number: 0711 0635 44
                    </p>
                </div>
            </div> --}}
        </div>
    </section>
@endsection