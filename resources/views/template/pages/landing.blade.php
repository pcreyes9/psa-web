@extends('template.master')

@section('title', 'Philippine Society of Anesthesiologists')

@section('content')
  <section id="hero" class="hero section">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">MISSION</h1>
          <p data-aos="fade-up" data-aos-delay="100">To promote and maintain a community of responsible anesthesiologists who can practice safe and quality anesthesia care in the pursuit of serving the interests of its members, their patients and the nation.</p>
          <h1 data-aos="fade-up">VISION</h1>
          <p data-aos="fade-up" data-aos-delay="100">A Society that envisions the Filipino anesthesiologists as world-class professionals pursuing the PSA Mission with a deep of fulfillment and pride.</p>
          <h1 data-aos="fade-up">SHARED VALUES</h1>
          <p data-aos="fade-up" data-aos-delay="100"><strong>Commitment to Quality Care |
            Concern for Members |
            Professional Growth</strong> </p>
          
          <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
              <a href="{{ route('login') }}" target="_blank" class="btn-get-started">Members Access <i class="bi bi-arrow-right"></i></a>
              <a href="https://www.youtube.com/watch?v=5SMk8MZjFPg" class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i class="bi bi-play-circle"></i><span>Watch PSA Hymn</span></a>
          </div>
        </div>

        <div class="col-lg-6 order-1 order-lg-2 hero-img d-flex flex-column align-items-center justify-content-center" data-aos="zoom-out">
          <img src="assets/template/logo/PSA_LOGO.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- /Hero Section -->
  <section id="portfolio" class="portfolio section mt-5">
    <!-- Section Title -->
    <div class="container section-title mt-5" data-aos="fade-up">
        <h2>ASEAN CONGRESS OF Anesthesiologists 2025</h2>
        <p>23rd - 25th October 2025 | MARRIOTT GRAND BALLROOM, Pasay City | Philippines</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
              @foreach ($arrLanding as $img)
                  <div class="col-lg-4 col-md-6 col-6 portfolio-item isotope-item opening">
                      <div class="portfolio-content h-100">
                          <img src="{{ asset($img['relative_path']) }}" alt="{{ $img['filename'] }}" class="img-fluid" alt="">
                          <div class="portfolio-info">
                              <h4>{{ strtoupper(str_replace('_', ' ', $img['last_folder'])) }}</h4>
                              <p>ASEAN CONGRESS OF Anesthesiologists 2025</p>
                              <a href="{{ asset($img['relative_path']) }}" alt="{{ $img['filename'] }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                              {{-- <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> --}}
                          </div>
                      </div>
                  </div>
              @endforeach            
            </div><!-- End Portfolio Container -->
          </div>

          <div class="d-flex justify-content-center mt-4">
              <button href="{{route('gallery-aca', ['day' => 'day1'])}}" class="w-1/2">View ACA 2025 Gallery</button>
          </div>
          
      </div>
      
  </section><!-- /Portfolio Section -->

    <!-- UPCOMING EVENTS Section -->
  <section id="pricing" class="pricing section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>UPCOMING EVENTS</h2> 
    </div><!-- End Section Title -->

    <div class="container">
      <div class="row gy-4 justify-content-center">
        <div class="col-xl-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="pricing-tem">
            <a target="_blank" href="https://aca2025manila.org/"><img src="images/ACA POSTER V9.png" class="img-fluid animated " alt=""></a>
          </div>
        </div>

        <div class="col-xl-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="pricing-tem">
            <a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSeLxzHgmHcx1M9uPgiyFTl2nQ2-1gJ9ua6QafSPxzhmHn5IqA/viewform?usp=header"><img src="images/PSARP Poster.png" class="img-fluid animated " alt=""></a>
          </div>
        </div>  

      </div>
    </div>
  </section><!-- /UPCOMING EVENTS Section -->

      <!-- RECENT EVENTS Section -->
      {{-- @include('template.pages.recentEvents') --}}
      <!-- Contact Section -->
  <section id="contact" class="contact section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Contact Us</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <div class="col-lg-12">
          <div class="row gy-4">
            <div class="col-md-6"  data-aos="zoom-in" data-aos-delay="200">
              <div class="info-item text-center card">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>Room 102, PMA Building, 1100 North Ave, Diliman, Quezon City, 1100 Metro Manila</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6"  data-aos="zoom-in" data-aos-delay="300">
              <div class="info-item text-center card" >
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>Globe: 0917 832 9069 | Smart: 0920 952 2120</p>
                <p></p>
                <p>Landlines: (+63) 02 8452-2058 | (+63) 02 8929-5852</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6"  data-aos="zoom-in" data-aos-delay="400">
              <div class="info-item text-center card">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>psainc_sec@yahoo.com</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6" data-aos="zoom-in" data-aos-delay="500">
              <div class="info-item text-center card"  >
                <i class="bi bi-clock"></i>
                <h3>Office Hours</h3>
                <p>Monday - Friday | 9:00AM - 05:00PM</p>
                <p></p>
              </div>
            </div><!-- End Info Item -->
            <div class="rounded">
              <iframe class="rounded w-100" 
                style="height: 500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9180.579689802897!2d121.02786002090562!3d14.658309365108796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b6e2af5aed05%3A0xa349a00f5cc8d19!2sThe%20Philippine%20Society%20of%20Anesthesiologists%2C%20Inc.!5e0!3m2!1sen!2sph!4v1745475471114!5m2!1sen!2sph"
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </secti on><!-- /Contact Section -->
@endsection