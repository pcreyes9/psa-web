@extends('template.master')

@section('title', 'Workshop Registration')

@section('content')
    <section>
        <div class="container mt-5">
            <div class="section-title" data-aos="fade-up">
                <h2>Workshop Registration</h2>
                @if (session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @endif
                <p class="" ><strong>Only registered members can register for the workshop.</strong></p>
                
                <livewire:workshop-registration/>
            </div>
        </div>
    </section>
@endsection