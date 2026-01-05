@extends('template.master')

@section('title', 'Midyear 2026 - Registration')

@section('content')
    <section id="portfolio" class="portfolio section mt-5">
        <div class="container pt-5 mt-5">
            <img src="images/PSA MIDYEAR 2026 RATES.jpg" class="img-fluid animated " alt="">
            
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('midyear-registration') }}"
                target="_blank"
                class="btn btn-primary px-4 py-2">
                    MEMBERS REGISTRATION
                </a>
            </div>
        </div>
    </section>
@endsection