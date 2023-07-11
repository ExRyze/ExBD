@extends('templates.index')

@section('main')

  <div class="row cards-small no-scrollbar">
      @foreach ($animes as $anime)
      <a class="card-link" href="{{ url("anime/".$anime->slug) }}">
        <div class="card-wrap">

          {{-- Image --}}
          @include('components.animecover')
        
          {{-- Description --}}
          <div class="description">
            <h6>{{ $anime->title }}</h6>
          </div>
        </div>
      </a>
      @endforeach
  </div>

@endsection