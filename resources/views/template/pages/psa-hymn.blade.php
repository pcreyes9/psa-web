@extends('template.master')

@section('title', 'PSA - Hymn')

@section('content')
    <section>
        <div class="container pt-5">
            <div class="mx-auto" style="max-width: 90%">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/hkIcSJ5enp8?si=tkrOkA55A5zfZmmB"
                            title="YouTube video player"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                            referrerpolicy="strict-origin-when-cross-origin">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection