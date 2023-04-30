@extends('templates.index')

@section('main')

    {{-- Anime Section --}}
    <div class="row flex-nowrap overflow-auto no-scrollbar">
        @foreach ($animes as $anime)
        <a class="col-3" href="{{ url("anime/".$anime->slug) }}">
            @include('components.animecover')
        </a>
        @endforeach
    </div>

@endsection