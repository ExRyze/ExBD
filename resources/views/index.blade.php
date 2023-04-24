@extends('templates.index')

@section('main')

    {{-- Carousel --}}
    {{-- <div class="row">
        <div class="col-12 position-relative">
            <div class="card">
                <div id="carouselExampleCaptions" class="ex-carousel carousel slide col-8" data-bs-ride="carousel">
                    <div class="ex-carousel-inner carousel-inner">
                        @foreach ($carousel as $indexCarousel => $itemCarousel)
                        <div @class(['carousel-item', 'active' => ! $indexCarousel])>
                            <div class="ex-img-container">
                                <img src="{{ url("assets/img/animes/ex-default/Banner.jpg") }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        @endforeach
                    </div>
    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    
                    <div class="ex-carousel-indicators carousel-indicators col-6">
                        @foreach ($carousel as $indexCarousel => $itemCarousel)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $indexCarousel }}" aria-label="Slide {{ $indexCarousel+1 }}" @class(['m-0', 'active' => ! $indexCarousel]) aria-current="true">
                            <div style="height: 50px;"></div>
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{--  --}}


@endsection