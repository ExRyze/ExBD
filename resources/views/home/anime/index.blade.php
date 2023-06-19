@extends('templates.index')

@section('main')

  <div class="row flex-nowrap overflow-auto no-scrollbar">
      @foreach ($animes as $anime)
      <a class="col-2" href="{{ url("anime/".$anime->slug) }}">
          @include('components.animecover')
      </a>
      @endforeach
  </div>

@endsection