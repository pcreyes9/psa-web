@extends('template.master')

@section('title', 'Midyear 2026 - Socials Program')

@section('content')
    <section>
        {{-- <div c'lass="pt-5 mx-2">
            <a href="{{ route('workshop-registration') }}"
            target="_blank"
            class="btn btn-primary w-100 px-4 py-2 fs-5 fw-bold text-center"
            style="max-width: 520px; margin: auto; display: block;">
                WORKSHOP REGISTRATION
            </a>
        </div> --}}

        <div class="container section-title mt-5 pt-5" data-aos="fade-up">
            <h2>SOCIALS PROGRAM</h2>
            <p>May 14, 2026 | KCC Events & Convention Center | General Santos City<br></p>
        </div><!-- End Section Title -->
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        {{-- <div class="container pt-5 mt-5">
            <img src="images/sci-program/front.png" class="img-fluid animated" alt="">
        </div> --}}
        <div class="container">
            <img src="images/socials-program/Opening Ceremony.png?v={{ time() }}" class="img-fluid animated" alt="">
        </div>
        <div class="container pt-sm-5 mt-2">
            <img src="images/socials-program/Fellowship Night.png?v={{ time() }}" class="img-fluid animated" alt="">
        </div>
        <div class="container pt-sm-5 mt-2">
            <img src="images/socials-program/Closing Ceremony.png?v={{ time() }}" class="img-fluid animated" alt="">
        </div>
        
    </section>
@endsection