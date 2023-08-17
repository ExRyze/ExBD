@extends('templates.index')

@section('main')

  @include('components.pagetitle')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="col-12 mb-3 d-flex justify-content-between">
          @if ($prev->count())
          <div class="dropdown">

            <button class="btn btn-primary" href="#" data-bs-toggle="dropdown"><i class="bi bi-chevron-left"></i> Prev</button>

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li>
                <hr class="dropdown-divider">
              </li>
              @foreach ($prev as $pre)
              @php 
                $episode = (strlen($pre->episode) === 1 ? "0".$pre->episode : $pre->episode);
                $bd = ($pre->bd === 0 ? "TV" : "BD");
                $type = ($table->type === "TV" ? $bd : $table->type." ".$bd);
                $res = explode('x', $pre->resolution);
                switch (true) {
                  case $res[0] === "7680" && $res[1] === "4320" :
                    $resolution = "8K";
                    break;
                  case $res[0] === "3840" && $res[1] === "2160" :
                    $resolution = "4K";
                    break;
                  case $res[0] === "2560" && $res[1] === "1440" :
                    $resolution = "2K";
                    break;
                  
                  default:
                    $resolution = $res[1]."p";
                    break;
                }
                $title = $table->folder->slug." Ep ".$episode." - ".$pre->origin." ".$type." ".$resolution.".".$pre->type;
                $path = str_replace(' ', '_', strtolower($title));
              @endphp
              <li class="dropdown-item">
                <a class="m-0" href="{{ url("dashboard/anime/video/$table->slug/edit/$path") }}">{{ $title }}</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              @endforeach
            </ul><!-- End Messages Dropdown Items -->

          </div>
          @endif

          @if ($next->count())
          <div class="dropdown">

            <button class="btn btn-primary" href="#" data-bs-toggle="dropdown">Next <i class="bi bi-chevron-right"></i></button>

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li>
                <hr class="dropdown-divider">
              </li>
              @foreach ($next as $nex)
              @php 
                $episode = (strlen($nex->episode) === 1 ? "0".$nex->episode : $nex->episode);
                $bd = ($nex->bd === 0 ? "TV" : "BD");
                $type = ($table->type === "TV" ? $bd : $table->type." ".$bd);
                $res = explode('x', $nex->resolution);
                switch (true) {
                  case $res[0] === "7680" && $res[1] === "4320" :
                    $resolution = "8K";
                    break;
                  case $res[0] === "3840" && $res[1] === "2160" :
                    $resolution = "4K";
                    break;
                  case $res[0] === "2560" && $res[1] === "1440" :
                    $resolution = "2K";
                    break;
                  
                  default:
                    $resolution = $res[1]."p";
                    break;
                }
                $title = $table->folder->slug." Ep ".$episode." - ".$nex->origin." ".$type." ".$resolution.".".$nex->type;
                $path = str_replace(' ', '_', strtolower($title));
              @endphp
              <li class="dropdown-item">
                <a class="m-0" href="{{ url("dashboard/anime/video/$table->slug/edit/$path") }}">{{ $title }}</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              @endforeach
            </ul><!-- End Messages Dropdown Items -->

          </div>
          @endif
        </div>

        <div class="card">
          <div class="card-body" id="edit-form">
        
            <!-- General -->
            <h4>General</h4>
            <hr class="mt-0">
            <div class="d-flex flex-column position-relative">
              <form class="row g-3" method="POST" action="/dashboard/anime/video/{{ $anime->slug }}/update">
                @csrf
                <input required type="hidden" name="id" value="{{ $video->id }}">
                <div class="col-md-3">
                  <label for="size" class="form-label form-required">Size</label>
                  <input required autocomplete="off" step="0.1" name="size" type="number" min="0" class="form-control @error('size') is-invalid @enderror" id="size" placeholder="0 MB" value="{{ $video->size }}">
                  @error('size')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-3">
                  <label for="lenght_video" class="form-label form-required">Lenght video</label>
                  <input required autocomplete="off" name="lenght_video" type="text" class="form-control @error('lenght_video') is-invalid @enderror" id="lenght_video" value="{{ $video->lenght_video }}" pattern="[0-9][0-9]:[0-5][0-9]:[0-5][0-9]">
                  @error('lenght_video')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="widht" class="form-label form-required">Resolution</label>
                  <div class="d-flex gap-2">
                    <input required name="width" type="number" min="0" class="form-control @error('resolution') is-invalid @enderror" id="widht" placeholder="3840/1920/1280/854/640" value="{{ explode('x', $video->resolution)[0] }}">
                    X
                    <input required name="height" type="number" min="0" class="form-control @error('resolution') is-invalid @enderror" id="height" placeholder="2160/1080/720/480/360" value="{{ explode('x', $video->resolution)[1] }}">
                  </div>
                  @error('resolution')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="video_tracks" class="form-label">Video tracks</label>
                  <input name="video_tracks" type="text" class="form-control @error('video_tracks') is-invalid @enderror" id="video_tracks" value="{{ $video->video_tracks }}">
                  @error('video_tracks')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-3">
                  <label for="chapters" class="form-label form-required">Chapter</label>
                  <select required name="chapters" class="form-select @error('chapters') is-invalid @enderror" id="chapters">
                    @foreach ($data['chapters'] as $chapter)
                      <option value="{{ $chapter }}" {{ $video->chapters === $chapter ? "selected" : "" }}>{{ $chapter }}</option>
                    @endforeach
                  </select>
                  @error('chapters')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-3">
                  <label for="audio_tracks" class="form-label">Audio tracks</label>
                  <input name="audio_tracks" type="text" class="form-control @error('audio_tracks') is-invalid @enderror" id="audio_tracks" value="{{ $video->audio_tracks }}">
                  @error('audio_tracks')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-2">
                  <label for="episode" class="form-label form-required">Episode</label>
                  <input required autocomplete="off" step="0.1" name="episode" type="number" min="0" class="form-control @error('episode') is-invalid @enderror" id="episode" value="{{ $video->episode }}">
                  @error('episode')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-5">
                  <label for="origin" class="form-label form-required">Origin</label>
                  <select required name="origin" class="form-select @error('origin') is-invalid @enderror" id="origin">
                    @foreach ($data['origins'] as $origin)
                      <option value="{{ $origin }}" {{ $video->origin === $origin ? "selected" : "" }}>{{ $origin }}</option>
                    @endforeach
                  </select>
                  @error('origin')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-5">
                  <label for="type" class="form-label form-required">Type</label>
                  <select required name="type" class="form-select @error('type') is-invalid @enderror" id="type">
                    @foreach ($data['types'] as $type)
                      <option value="{{ $type }}" {{ $video->type === $type ? "selected" : "" }}>{{ $type }}</option>
                    @endforeach
                  </select>
                  @error('type')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-2 d-flex align-items-end">
                  <label for="bd" class="form-label"></label>
                  <div class="form-check">
                    <input name="bd" value="1" {{ $video->bd === 1 ? "checked" : "" }} class="form-check-input @error('bd') is-invalid @enderror" type="checkbox" id="bd">
                    <label class="form-check-label" for="bd">
                      Blu-ray
                    </label>
                  </div>
                  @error('bd')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-end">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
              <form class="d-inline position-absolute left-0 bottom-0" action="/dashboard/anime/video/{{ $table->slug }}/approve" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $video->id }}">
                @if ($video->approved === 0)
                <button type="submit" name="submit" value="approve" class="btn btn-success">
                  <i class="bi bi-check-circle"></i>
                  Approve
                </button>
                @else
                <button type="submit" name="submit" value="refuse" class="btn btn-warning">
                  <i class="bi bi-exclamation-triangle"></i>
                  Refuse
                </button>
                @endif
              </form>
            </div><!-- End General -->

            <!-- Subtitles -->
            <h4 class="mt-5 d-flex ex-chevron collapsed" type="button" data-bs-target="#subtitles-form" data-bs-toggle="collapse" aria-expanded="false">
              <span>Subtitles</span>
              <i class="bi bi-chevron-down ms-auto"></i>
            </h4>
            <hr class="mt-0">
            <div id="subtitles-form" class="collapse" data-bs-parent="#edit-form">
              @foreach ($video->subtitles as $subtitle)
              <form class="row g-3 form-subtitles" method="POST" action="/dashboard/animevideosubtitle/update">
                @csrf
                <input type="hidden" name="id" value="{{ $subtitle->id }}">
                <input type="hidden" name="video_anime_id" value="{{ $video->id }}">
                <div class="col-md-3">
                  <label for="origin" class="form-label form-required">Origin Subtitle</label>
                  <select required name="origin" class="form-select @error('origin') is-invalid @enderror" id="origin">
                    @foreach ($data['origins'] as $origin)
                      @if ($origin === $subtitle->origin)
                        <option selected value="{{ $origin }}">{{ $origin }}</option>
                      @else
                        <option value="{{ $origin }}">{{ $origin }}</option>
                      @endif
                    @endforeach
                  </select>
                  @error('origin')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-9">
                  <label for="subtitle" class="form-label form-required">Subtitle</label>
                  <input required value="{{ $subtitle->subtitle }}" name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" placeholder="Subtitle">
                  @error('subtitle')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-end">
                  <button type="submit" name="submit" value="update" class="btn btn-warning">Update</button>
                  <button type="submit" name="submit" value="delete" class="btn btn-danger">Delete</button>
                </div>
              </form>
              <hr>
              @endforeach

              <form class="row g-3 form-subtitles" method="POST" action="/dashboard/animevideosubtitle/store">
                @csrf
                <input type="hidden" name="video_anime_id" value="{{ $video->id }}">
                <div class="col-md-3">
                  <label for="origin" class="form-label form-required">Origin Subtitle</label>
                  <select required name="origin" class="form-select @error('origin') is-invalid @enderror" id="origin">
                    <option selected hidden disabled>Choose Origin...</option>
                    @foreach ($data['origins'] as $origin)
                      <option value="{{ $origin }}">{{ $origin }}</option>
                    @endforeach
                  </select>
                  @error('origin')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-9">
                  <label for="subtitle" class="form-label form-required">Subtitle</label>
                  <input required name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" placeholder="Subtitle">
                  @error('subtitle')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-end">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- End Subtitles -->

            <!-- Mistakes -->
            <h4 class="mt-5 d-flex ex-chevron collapsed" type="button" data-bs-target="#mistakes-form" data-bs-toggle="collapse" aria-expanded="false">
              <span>Mistakes</span>
              <i class="bi bi-chevron-down ms-auto"></i>
            </h4>
            <hr class="mt-0">
            <div id="mistakes-form" class="collapse" data-bs-parent="#edit-form">
              <form class="row g-3 form-mistakes" method="POST" action="/dashboard/animevideomistake/store">
                @csrf
                <input type="hidden" name="video_anime_id" value="{{ $video->id }}">
                @foreach ($mistakes as $mistake)
                @php $created = false; @endphp
                <div class="col-md-3 text-center">
                  @foreach ($video->mistakes as $videomistake)
                    @if ($mistake->id === $videomistake->mistake_id)
                    <label for="mistake{{ $mistake->id }}"><input checked type="checkbox" name="mistake_id[]" value="{{ $mistake->id }}" id="mistake{{ $mistake->id }}">{{ $mistake->mistake }}</label> <br>
                    @php $created = true; @endphp
                    @endif
                  @endforeach
                  @if (!$created)
                  <label for="mistake{{ $mistake->id }}"><input type="checkbox" name="mistake_id[]" value="{{ $mistake->id }}" id="mistake{{ $mistake->id }}"> {{ $mistake->mistake }}</label> <br>
                  @endif
                </div>
                @endforeach
                @error('mistake_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
              <hr>

              <form class="row g-3 form-mistakes" method="POST" action="/dashboard/animemistake/store">
                @csrf
                <input type="hidden" name="video_anime_id" value="{{ $video->id }}">
                <div class="col-md-12">
                  <label for="mistake" class="form-label form-required">Mistakes</label>
                  <input required name="mistake" type="text" class="form-control @error('mistake') is-invalid @enderror" id="mistake" placeholder="Mistakes">
                  @error('mistake')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-end">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- End Mistakes -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection