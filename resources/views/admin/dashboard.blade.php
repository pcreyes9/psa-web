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
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>John</td>
                        <td>Doe</td>
                        <td>@social</td>
                        </tr>
                    </tbody>
                </table>
                
                {{-- <livewire:midyear-registration/> --}}
            </div>
        </div>
    </section>
@endsection