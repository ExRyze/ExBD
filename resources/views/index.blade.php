@extends('templates.index')

@section('main')

    <div class="row">
        <div class="col-12 position-relative">
            <div class="card">
                <div id="carouselExampleCaptions" class="ex-carousel carousel slide col-8" data-bs-ride="carousel">
                    <div class="ex-carousel-inner carousel-inner">
                        <div class="carousel-item active">
                            <div class="ex-img-container">
                                <img src="assets/img/Animes/Banner.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="ex-img-container">
                                <img src="assets/img/Banner-NULL.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="ex-img-container">
                                <img src="assets/img/Animes/Banner.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
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
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-label="Slide 1" class="m-0 active" aria-current="true">
                            <div style="height: 50px;"></div>
                        </button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="m-0">
                            <div style="height: 50px;"></div>
                        </button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class="m-0">
                            <div style="height: 50px;"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-4">
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div> --}}
    </div>

@endsection