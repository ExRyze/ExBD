@extends('templates.index')

@section('main')

    <header class="sub-header"><h5 class="title"><strong>{{ $anime->title }}</strong></h5></header>

    <div class="row">
        <div class="col-3 d-flex flex-column ps-0 pt-3" style="box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);">
            <div class="mb-4">
                <img src="{{ url("assets/img/animes/ex-default/Cover.jpg") }}" alt="" width="100%">
            </div>
            <div class="mb-4">
                <h5><strong>Information</strong></h5>
                <hr class="mt-0">
                <p>
                <strong>Type:</strong> {{ $anime->type }} <br>
                <strong>Episodes:</strong> {{ $anime->episodes }} <br>
                <strong>Status:</strong> {{ $anime->status }} <br>
                @if ($anime->type === "Movie" && $anime->status != "Finished airing")
                <strong>Aired:</strong> ? <br>
                @else
                <strong>Aired:</strong> {{ date("M d, Y", strtotime($anime->date_aired)) }} <br>
                @endif
                @if ($anime->type != "Movie" && $anime->status === "Finished airing")
                <strong>Finished:</strong> {{ date("M d, Y", strtotime($anime->date_finished)) }} <br>
                @elseif ($anime->type != "Movie" && $anime->status != "Finished airing")
                <strong>Finished:</strong> ? <br>
                @endif
                <strong>Producers:</strong> - <br>
                <strong>Licensors:</strong> - <br>
                <strong>Studios:</strong> - <br>
                <strong>Source:</strong> {{ $anime->source }} <br>
                <strong>Genres:</strong> - <br>
                <strong>Themes:</strong> - <br>
                <strong>Duration:</strong> {{ $anime->duration }} <small>min./ep.</small> <br>
                <strong>Rating:</strong> - <br>
                </p>
            </div>
        </div>
        <div class="col-9 pt-3">
            <div class="mb-4">
                <h5><strong>Synopsis</strong></h5>
                <hr class="mt-0">
                <p>{{ $anime->synopsis }}</p>
            </div>
        </div>
    </div>

@endsection