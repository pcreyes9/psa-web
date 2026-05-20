@extends('template.master')

@section('title', 'Midyear 2026 - Evaluation Form')

@section('content')
    <section>
        <div class="container mt-5">
            <div class="section-title" data-aos="fade-up">
                <h2>PSA MIDYEAR CONVENTION 2026 Evaluation Form</h2>
                @if (session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="d-flex justify-content-center mt-5">
                    <a href="https://forms.gle/yvuDo1BKQm9eQyWKA"
                        target="_blank"
                        class="btn btn-primary px-4 py-2 fw-bold">
                        EVALUATION FORM
                    </a>
                </div>
                
                <livewire:evaluation-form/>
            </div>
        </div>
    </section>
@endsection