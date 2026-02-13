@extends('template.master')

@section('title', '404 ERROR')

@section('content')
    <section>
        <div class="container mt-5">
            <div class="text-center">
                <h1 class="display-1 fw-bold text-danger">404</h1>
                <h3 class="mb-3">Page Not Found</h3>
                <p class="text-muted mb-4">
                    Sorry, the page you are looking for doesn’t exist or has been moved.
                </p>

                <a href="{{ url('/') }}" class="btn btn-primary px-4">
                    Back Home
                </a>
                <div class="mt-3">
                <img
                    src="{{ asset('assets/img/404.png') }}"
                    alt="page-misc-error-light"
                    width="500"
                    class="img-fluid"
                    data-app-dark-img="illustrations/page-misc-error-dark.png"
                    data-app-light-img="illustrations/page-misc-error-light.png"
                />
                </div>
            </div>
        </div>
    </section>
@endsection