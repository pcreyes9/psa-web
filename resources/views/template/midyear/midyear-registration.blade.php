@extends('template.master')

@section('title', 'Midyear 2026 - Registration')

@section('content')
    <section>
        <div class="container mt-5">
            <div class="section-title" data-aos="fade-up">
                <h2>Midyear Convention 2026 Registration</h2>
                @if (session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @endif
                <p class="" ><strong>Forgot your PSA ID NO.? </strong></p>
                
                <livewire:midyear-registration/>
            </div>
        </div>
    </section>
@endsection