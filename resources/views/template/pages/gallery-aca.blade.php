@extends('template.master')

@section('title', 'ACA 2025 - GALLERY ')

@section('content')
<div id="page-loader">
    <div class="loader-content">
        <div class="spinner"></div>
        <p class="loader-text">Images are loading...</p>
    </div>
</div>

<section id="portfolio" class="portfolio section mt-5">
      <!-- Section Title -->
    <div class="container section-title mt-5" data-aos="fade-up">
        <h2>ASEAN CONGRESS OF Anesthesiologists 2025</h2>
    <p>{{$title}}</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".opening">Opening Ceremony</li>
                <li data-filter=".asean">Asean Night</li>
                <li data-filter=".registration">Registration</li>
                <li data-filter=".lectures">Plenary Lectures</li>
                <li data-filter=".chapter">Chapter Delegates Meeting</li>
            </ul><!-- End Portfolio Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($arrOpening as $pic)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item opening">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('images/gallery/aca_2025/'.$day. '/opening_ceremony/' . $pic) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Opening Ceremony</h4>
                                <p>ASEAN CONGRESS OF Anesthesiologists 2025</p>
                                <a href="{{ asset('images/gallery/aca_2025/'.$day. '/opening_ceremony/' . $pic) }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                {{-- <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($arrAsean as $pic)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item asean">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('images/gallery/aca_2025/'.$day. '/asean_night/' . $pic) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Asean Night</h4>
                                <p>ASEAN CONGRESS OF Anesthesiologists 2025</p>
                                <a href="{{ asset('images/gallery/aca_2025/'.$day. '/asean_night/' . $pic) }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                {{-- <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($arrReg as $pic)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item registration">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('images/gallery/aca_2025/'.$day. '/registration/' . $pic) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Registration</h4>
                                <p>ASEAN CONGRESS OF Anesthesiologists 2025</p>
                                <a href="{{ asset('images/gallery/aca_2025/'.$day. '/registration/' . $pic) }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                {{-- <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($arrLectures as $pic)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item lectures">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('images/gallery/aca_2025/'.$day. '/lectures/' . $pic) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Plenary Lectures</h4>
                                <p>ASEAN CONGRESS OF Anesthesiologists 2025</p>
                                <a href="{{ asset('images/gallery/aca_2025/'.$day. '/lectures/' . $pic) }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                {{-- <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($arrChapter as $pic)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item chapter">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('images/gallery/aca_2025/'.$day. '/chapter_delegates/' . $pic) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Chapter Delegates Meeting</h4>
                                <p>ASEAN CONGRESS OF Anesthesiologists 2025</p>
                                <a href="{{ asset('images/gallery/aca_2025/'.$day. '/chapter_delegates/' . $pic) }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                {{-- <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- End Portfolio Container -->
        </div>
    </div>
</section><!-- /Portfolio Section -->
@endsection

<script>
    window.addEventListener("load", function () {
        const loader = document.getElementById("page-loader");
        loader.style.opacity = "0";
        setTimeout(() => loader.style.display = "none", 500);
    });
</script>