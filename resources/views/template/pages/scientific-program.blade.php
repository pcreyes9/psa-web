@extends('template.master')

@section('title', 'Midyear 2026 - Scientific Program')

@section('content')
    <section>
        {{-- <div class="container pt-5 mt-5">
            <img src="images/sci-program/front.png" class="img-fluid animated" alt="">
        </div> --}}
        <div class="container pt-5 mt-2">
            <img src="images/sci-program/day1.png?v={{ time() }}" class="img-fluid animated" alt="">
        </div>
        <div class="container pt-5 mt-2">
            <img src="images/sci-program/day2.png?v={{ time() }}" class="img-fluid animated" alt="">
        </div>
        <div class="container pt-5 mt-2">
            <img src="images/sci-program/day3.png?v={{ time() }}" class="img-fluid animated" alt="">
        </div>
    </section>
@endsection