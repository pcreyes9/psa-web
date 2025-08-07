@extends('template.master')

@section('title', 'Email Update')

@section('content')
    <section id="contact" class="contact section">
      
      <div class="container section-title my-5" data-aos="fade-up">
        <p class="mb-5">Update Your Email</p>
        <livewire:email-update/>
      </div>
    </section><!-- /Contact Section -->
@endsection