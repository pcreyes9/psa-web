@extends('template.master')

@section('title', 'Midyear 2026 - Scientific Program')

@section('content')
    <section>
        {{-- <div class="pt-5 mx-2">
            <a href="{{ route('workshop-registration') }}"
            target="_blank"
            class="btn btn-primary w-100 px-4 py-2 fs-5 fw-bold text-center"
            style="max-width: 520px; margin: auto; display: block;">
                WORKSHOP REGISTRATION
            </a>
        </div> --}}
        <div class="container section-title mt-5 pt-5" data-aos="fade-up">
            <h2>SCIENTIFIC PROGRAM</h2>
            <p>May 14, 2026 | KCC Events & Convention Center | General Santos City<br></p>
            @if (session('success'))
                <div class="alert alert-success mt-4 text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row my-4 pt-5 justify-content-center">
                <div class="col-md-6 mb-2">
                    <a href="{{ route('workshop-registration') }}"
                        target="_blank"
                        class="btn btn-primary w-100 px-4 py-2 fs-5 fw-bold text-center">
                        Workshp Registration
                    </a>
                </div>
            </div>
            <div class=" pt-3 mt-2">
                <img src="images/sci-program/day1.png?v={{ time() }}" class="img-fluid animated" alt="">
            </div>
            <div class=" pt-sm-5 mt-2">
                <img src="images/sci-program/day2.png?v={{ time() }}" class="img-fluid animated" alt="">
            </div>
            <div class=" pt-sm-5 mt-2">
                <img src="images/sci-program/day3.png?v={{ time() }}" class="img-fluid animated" alt="">
            </div>
        </div><!-- End Section Title -->
        
        
        {{-- <div class="container pt-5 mt-5">
            <img src="images/sci-program/front.png" class="img-fluid animated" alt="">
        </div> --}}
        
        
    </section>
@endsection