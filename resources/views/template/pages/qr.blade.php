@extends('template.master')

@section('title', 'PSA - Scan Member')

@section('content')
    <section>
        <div class="container pt-5">
            <livewire:scan-qr/>
        </div>
    </section>
@endsection