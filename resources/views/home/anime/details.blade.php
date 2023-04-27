@extends('home.anime.template')

@section('article')
  <div class="mb-4">
    <h5><strong>Synopsis</strong></h5>
    <hr class="mt-0">
    <p>{!! nl2br($anime->synopsis) !!}</p>
  </div>
@endsection