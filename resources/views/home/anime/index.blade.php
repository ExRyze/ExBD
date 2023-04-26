@extends('templates.index')

@section('main')

    {{-- Anime Section --}}
    <div class="row flex-nowrap overflow-auto no-scrollbar">
        @foreach ($carousel as $indexCarousel => $itemCarousel)
        <a class="col-3" href="{{ url("anime/".$itemCarousel->slug) }}">
            <img src="{{ url("assets/img/animes/ex-default/Cover.jpg") }}" alt="" width="100%">
        </a>
        @endforeach
    </div>


@endsection