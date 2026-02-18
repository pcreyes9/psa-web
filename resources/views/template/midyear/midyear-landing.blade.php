@extends('template.master')

@section('title', 'Midyear Convention 2026')

@section('content')
    <section id="services" class="services section mt-5 pt-5">
        <div class="container section-title" data-aos="fade-up">
            <h2>MIDYEAR CONVENTION 2026</h2>
            <p>May 14, 2026 | KCC Events & Convention Center | General Santos City<br></p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-cyan position-relative">
                        <i class="bi bi-image-fill icon"></i>
                        <h3>Poster</h3>
                        {{-- <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p> --}}
                        <a href="{{ route('midyear-poster') }}" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item item-orange position-relative">
                        <i class="bi bi-calendar-event-fill icon"></i>
                        <h3>Registration</h3>
                        <a href="{{ route('midyear-registration-deets') }}" class="stretched-link"></a>

                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item item-teal position-relative">
                        <i class="bi bi-easel icon"></i>
                        <h3>List of Exhibitors</h3>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item item-red position-relative">
                        <i class="bi bi-journal-bookmark icon"></i>
                        <h3>Program</h3>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item item-indigo position-relative">
                        <i class="bi bi-airplane icon"></i>
                        <h3>Accommodation & Tours</h3>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item item-pink position-relative">
                        <i class="bi bi-chat-square-text icon"></i>
                        <h3>Abstract Submission</h3>
                    </div>
                </div><!-- End Service Item -->
            </div>
        </div>  
    </section><!-- /Services Section -->
@endsection

