@extends('template.master')

@section('title', 'Midyear 2026 - Registration')

@section('content')
    <section>
        <div class="container mt-5">
            <div class="section-title" data-aos="fade-up">
                <h2>PSA MIDYEAR CONVENTION 2026 RAFFLE</h2>
                @if (session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                <livewire:booth-controller :booth="$booth"/>
            </div>
        </div>
    </section>
@endsection