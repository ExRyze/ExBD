@extends('templates.index')

@section('main')

    <header class="sub-header"><h5 class="title"><strong>{{ $anime->title }}</strong></h5></header>

    <div class="row">
        <div class="col-3 d-flex flex-column ps-0 pt-3">
            <div class="mb-4">
                @include('components.animecover')
            </div>
            <div class="mb-4">
                <h5><strong>Alternative Titles</strong></h5>
                <hr class="mt-0 mb-2">
                <div class="mb-5">
                    @foreach ($anime->aliases as $alias)
                    <p class="py-1 mb-0"><strong>{{ $alias->origin }}:</strong> {{ $alias->alias }} </p>
                    @endforeach
                </div>

                <h5><strong>Information</strong></h5>
                <hr class="mt-0 mb-2">
                <p class="py-1 mb-0"><strong>Type:</strong> {{ $anime->type }} </p>
                <p class="py-1 mb-0"><strong>Episodes:</strong> {{ $anime->episodes }} </p>
                <p class="py-1 mb-0"><strong>Status:</strong> {{ $anime->status }} </p>
                @if ($anime->type === "Movie" && $anime->status != "Finished airing")
                <p class="py-1 mb-0"><strong>Aired:</strong> ? </p>
                @else
                <p class="py-1 mb-0"><strong>Aired:</strong> {{ date("M d, Y", strtotime($anime->date_aired)) }} </p>
                @endif
                @if ($anime->type != "Movie" && $anime->status === "Finished airing")
                <p class="py-1 mb-0"><strong>Finished:</strong> {{ date("M d, Y", strtotime($anime->date_finished)) }} </p>
                @elseif ($anime->type != "Movie" && $anime->status != "Finished airing")
                <p class="py-1 mb-0"><strong>Finished:</strong> ? </p>
                @endif
                <p class="py-1 mb-0"><strong>Producers:</strong>
                @foreach ($anime->producers as $iproducer => $producer)
                    <a href="#">{{ $producer->producer->producer }}</a>@break ($iproducer === (count($anime->producers)-1)),
                @endforeach
                </p>
                <p class="py-1 mb-0"><strong>Licensors:</strong>
                @foreach ($anime->licensors as $ilicensor => $licensor)
                    <a href="#">{{ $licensor->licensor->licensor }}</a>@break ($ilicensor === (count($anime->licensors)-1)),
                @endforeach
                </p>
                <p class="py-1 mb-0"><strong>Studios:</strong>
                @foreach ($anime->studios as $istudio => $studio)
                    <a href="#">{{ $studio->studio->studio }}</a>@break ($istudio === (count($anime->studios)-1)),
                @endforeach
                </p>
                <p class="py-1 mb-0"><strong>Source:</strong> {{ $anime->source }} </p>
                <p class="py-1 mb-0"><strong>Genres:</strong>
                @foreach ($anime->genres as $igenre => $genre)
                    <a href="#">{{ $genre->genre->genre }}</a>@break ($igenre === (count($anime->genres)-1)),
                @endforeach
                </p>
                <p class="py-1 mb-0"><strong>Themes:</strong>
                @foreach ($anime->themes as $itheme => $theme)
                    <a href="#">{{ $theme->theme->theme }}</a>@break ($itheme === (count($anime->themes)-1)),
                @endforeach
                </p>
                <p class="py-1 mb-0"><strong>Duration:</strong> {{ $anime->duration }} <small>min./ep.</small> </p>
                <p class="py-1 mb-0"><strong>Rating:</strong> - </p>
                </p>
            </div>
        </div>
        <div class="col-9 pt-3">
            @yield('article')
        </div>
    </div>

@endsection