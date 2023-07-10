@extends('templates.index')

@section('main')

  <div class="row flex-wrap align-items-stretch overflow-auto no-scrollbar">
      @foreach ($animes as $anime)
      <a class="col-2 mb-4 text-light" href="{{ url("anime/".$anime->slug) }}">
        <div class="bg-secondary rounded d-flex flex-column overflow-hidden" style="height: 100%;">

          {{-- Image --}}
          @include('components.animecover')
        
          {{-- Description --}}
          <div class="col-12 p-2">
            <h6>{{ $anime->title }}</h6>
          </div>
        </div>
      </a>
      @endforeach
  </div>

@endsection