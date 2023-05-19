@extends('templates.index')
{{-- {{ dd($errors) }} --}}
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

        <div class="card">
          <div class="card-body" id="edit-form">
        
            <!-- General -->
            <h4>General</h4>
            <hr class="mt-0">
            <form class="row g-3" method="POST" action="/dashboard/video/anime/{{ $anime->slug }}/update">
              @csrf
              <input required type="hidden" name="id" value="{{ $video->id }}">
              <div class="col-md-3">
                <label for="lenght_video" class="form-label">Lenght video</label>
                <input required name="lenght_video" type="text" class="form-control @error('lenght_video') is-invalid @enderror" id="lenght_video" value="{{ $video->lenght_video }}" pattern="[0-9][0-9]:[0-5][0-9]:[0-5][0-9]">
                @error('lenght_video')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="resolution" class="form-label">Resolution</label>
                <div class="d-flex gap-2">
                  <input required name="width" type="number" min="0" class="form-control @error('resolution') is-invalid @enderror" id="widht" placeholder="3840/1920/1280/854/640" value="{{ explode('x', $video->resolution)[0] }}">
                  X
                  <input required name="height" type="number" min="0" class="form-control @error('resolution') is-invalid @enderror" id="height" placeholder="2160/1080/720/480/360" value="{{ explode('x', $video->resolution)[1] }}">
                </div>
                @error('resolution')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="size" class="form-label">Size</label>
                <input required name="size" type="number" min="0" class="form-control @error('size') is-invalid @enderror" id="size" placeholder="0 MB" value="{{ $video->size }}">
                @error('size')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="video_tracks" class="form-label">Video tracks</label>
                <input name="video_tracks" type="text" class="form-control @error('video_tracks') is-invalid @enderror" id="video_tracks" placeholder="H264 (...)" value="{{ $video->video_tracks }}">
                @error('video_tracks')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="audio_tracks" class="form-label">Audio tracks</label>
                <input name="audio_tracks" type="text" class="form-control @error('audio_tracks') is-invalid @enderror" id="audio_tracks" placeholder="ACC 2.0 [...]" value="{{ $video->audio_tracks }}">
                @error('audio_tracks')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="chapters" class="form-label">Chapter</label>
                <select required name="chapters" class="form-select @error('chapters') is-invalid @enderror" id="chapters">
                  @foreach ($data['chapters'] as $chapter)
                    <option value="{{ $chapter }}" {{ $video->chapter === $chapter ? "selected" : "" }}>{{ $chapter }}</option>
                  @endforeach
                </select>
                @error('chapters')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-2">
                <label for="episode" class="form-label">Episode</label>
                <input name="episode" type="number" min="0" class="form-control @error('episode') is-invalid @enderror" id="episode" placeholder="00" value="{{ $video->episode }}">
                @error('episode')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-5">
                <label for="origin" class="form-label">Origin</label>
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
                <label for="type" class="form-label">Type</label>
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
                <label for="cover" class="form-label"></label>
                <div class="form-check">
                  <input name="cover" value="1" {{ $video->cover === 1 ? "checked" : "" }} class="form-check-input @error('cover') is-invalid @enderror" type="checkbox" id="cover">
                  <label class="form-check-label" for="cover">
                    Cover
                  </label>
                </div>
                @error('cover')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form><!-- End General -->

            <!-- Subtitles -->
            <h4 class="mt-5 d-flex ex-chevron collapsed" type="button" data-bs-target="#subtitles-form" data-bs-toggle="collapse" aria-expanded="false">
              <span>Subtitles</span>
              <i class="bi bi-chevron-down ms-auto"></i>
            </h4>
            <hr class="mt-0">
            <div id="subtitles-form" class="collapse" data-bs-parent="#edit-form">
              @foreach ($video->subtitles as $subtitle)
              <form class="row g-3 form-subtitles" method="POST" action="/dashboard/videoanimesubtitle/delete">
                @csrf
                <input type="hidden" name="id" value="{{ $subtitle->id }}">
                <div class="col-md-3">
                  <label for="origin" class="form-label">Origin Alias</label>
                  <select readonly name="origin" class="form-select @error('origin') is-invalid @enderror" id="origin">
                    @foreach ($data['origins'] as $origin)
                      @if ($origin === $subtitle->origin)
                        <option selected value="{{ $origin }}">{{ $origin }}</option>
                      @endif
                    @endforeach
                  </select>
                  @error('origin')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-9">
                  <label for="subtitle" class="form-label">Subtitle</label>
                  <input readonly value="{{ $subtitle->subtitle }}" name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" placeholder="Alias">
                  @error('subtitle')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </div>
              </form>
              <hr>
              @endforeach

              <form class="row g-3 form-subtitles" method="POST" action="/dashboard/videoanimesubtitle/store">
                @csrf
                <input type="hidden" name="video_anime_id" value="{{ $video->id }}">
                <div class="col-md-3">
                  <label for="origin" class="form-label">Origin Subtitle</label>
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
                  <label for="subtitle" class="form-label">Subtitle</label>
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
              <form class="row g-3 form-mistakes" method="POST" action="/dashboard/videoanimemistake/store">
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
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <hr>

              <form class="row g-3 form-mistakes" method="POST" action="/dashboard/mistake/store">
                @csrf
                <input type="hidden" name="video_anime_id" value="{{ $video->id }}">
                <div class="col-md-12">
                  <label for="mistake" class="form-label">Mistakes</label>
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