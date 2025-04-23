@extends('template.master')

@section('title', 'Speakers')
@section('banner-name', 'Program > Speakers')

@section('content')
    <section id="hero" class="hero section">
        <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">PHILIPPINE SOCIETY OF ANESTHESIOLOGISTS</h1>
            {{-- <p data-aos="fade-up" data-aos-delay="100">We are team of talented designers making websites with Bootstrap</p> --}}
            {{-- <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                <a href="#about" class="btn-get-started">Get Started <i class="bi bi-arrow-right"></i></a>
                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div> --}}
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/template/logo/PSA_LOGO.png" class="img-fluid animated" alt="">
            </div>
        </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Values Section -->
    <section id="values" class="values section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Our Values</h2>
          <p>What we value most<br></p>
        </div><!-- End Section Title -->
  
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
                {{-- <img src="assets/img/values-1.png" class="img-fluid" alt=""> --}}
                <h3>MISSION</h3>
                <p>To promote and maintain a community of responsible anesthesiologists who can practice safe and quality anesthesia care in the pursuit of serving the interests of its members, their patients and the nation.</p>
              </div>
            </div><!-- End Card Item -->
  
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
              <div class="card">
                {{-- <img src="assets/img/values-2.png" class="img-fluid" alt=""> --}}
                <h3>VISION</h3>
                <p>A Society that envisions the Filipino anesthesiologists as world-class professionals pursuing the PSA Mission with a deep of fulfillment and pride.</p>
              </div>
            </div><!-- End Card Item -->
  
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
              <div class="card">
                {{-- <img src="assets/img/values-3.png" class="img-fluid" alt=""> --}}
                <h3>SHARED VALUES</h3>
                <p>
                    Commitment to Quality Care <br>
                    Concern for Members <br>
                    Professional Growth
                </p>
              </div>
            </div><!-- End Card Item -->
  
          </div>
  
        </div>
  
      </section><!-- /Values Section -->
@endsection