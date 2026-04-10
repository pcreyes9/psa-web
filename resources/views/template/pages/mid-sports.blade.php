@extends('template.master')

@section('title', 'Midyear 2026 - Pickleball Tournament')

@section('content')
    <section id="portfolio" class="portfolio section">
        <!-- Section Title -->
        <div class="container section-title mt-5" data-aos="fade-up">
            <h2>Pickleball Tournament</h2> 
        </div><!-- End Section Title -->
        <div class="container text-center">
            {{-- <p class="text-muted text-center"><i>(Click the poster to see registration details and rates)</i></p> --}}
            <div class="row text-center px-md-5 mx-md-5">
                
                <div class="col-md-12 mb-3">
                    <a target="_blank" href="https://accounts.google.com/...">
                        <img src="images/Pickleball_Tournament.jpg" class="img-fluid w-100" alt="">
                    </a>
                </div>

                <div class="col-md-12 mb-3">
                    <a target="_blank" href="https://accounts.google.com/...">
                        <img src="images/Pickleball_Category.jpg" class="img-fluid w-100" alt="">
                    </a>
                </div>

            </div>
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