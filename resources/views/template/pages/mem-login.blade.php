@extends('template.master')

@section('title', 'Memeber Login')

@section('content')
    <section id="contact" class="contact section">
      
      <div class="container section-title my-5" data-aos="fade-up">
        <p class="mb-5">PSA LOGIN</p>
        <livewire:mem-login/>
      </div>
    </section><!-- /Contact Section -->
@endsection