@extends('template.master')

@section('title', 'PSA - Hymn')

@section('content')
    <section>
        <div class="container pt-5">
            <div class="mx-auto" style="max-width: 90%">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/5SMk8MZjFPg?si=g_ZjMaWyMDrF3jFB"
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