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
                @foreach ($arrGallery as $folder => $images)
                    <li data-filter=".{{ $folder }}">{{ strtoupper(str_replace('_', ' ', $folder)) }}</li>

                    {{-- <li data-filter=".asean">Asean Night</li>
                    <li data-filter=".registration">Registration</li>
                    <li data-filter=".lectures">Plenary Lectures</li>
                    <li data-filter=".chapter">Chapter Delegates Meeting</li> --}}
                @endforeach
            </ul><!-- End Portfolio Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($arrGallery as $folder => $images)
                    @foreach ($images as $img)
                        <div class="col-lg-4 col-md-6 col-6 portfolio-item isotope-item {{ $folder }}">
                            <div class="portfolio-content h-100">
                                <img src="{{ asset($img['relative_path']) }}" alt="{{ $img['filename'] }}" class="img-fluid">
                                <div class="portfolio-info">
                                    <h4>{{ strtoupper(str_replace('_', ' ', $folder)) }}</h4>
                                    <p>ASEAN CONGRESS OF Anesthesiologists 2025</p>
                                    <a href="{{ asset($img['relative_path']) }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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