@extends('templates.index')

@section('main')

  @include('components.pagetitle')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        @if (session('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
          <div class="card-body">
        
            <!-- General -->
            <h4>General</h4>
            <hr class="m-0">
            <form class="row g-3" method="POST" action="/dashboard/anime/video/{{ $anime->slug }}/store">
              @csrf
              <input required type="hidden" name="folder_anime_id" value="{{ $anime->folder->id }}">
              <div class="col-md-3">
                <label for="size" class="form-label form-required">Size</label>
                <input required autocomplete="off" step="0.1" name="size" type="number" min="0" class="form-control @error('size') is-invalid @enderror" id="size" placeholder="0 MB">
                @error('size')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="lenght_video" class="form-label form-required">Lenght video</label>
                <input required autocomplete="off" name="lenght_video" type="text" class="form-control @error('lenght_video') is-invalid @enderror" id="lenght_video" value="00:00:00" pattern="[0-9][0-9]:[0-5][0-9]:[0-5][0-9]">
                @error('lenght_video')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="widht" class="form-label form-required">Resolution</label>
                <div class="d-flex gap-2">
                  <input required name="width" type="number" min="0" class="form-control @error('resolution') is-invalid @enderror" id="widht" placeholder="3840/1920/1280/854/640">
                  X
                  <input required name="height" type="number" min="0" class="form-control @error('resolution') is-invalid @enderror" id="height" placeholder="2160/1080/720/480/360">
                </div>
                @error('resolution')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="video_tracks" class="form-label">Video tracks</label>
                <input name="video_tracks" type="text" class="form-control @error('video_tracks') is-invalid @enderror" id="video_tracks" placeholder="H264 (...)">
                @error('video_tracks')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="chapters" class="form-label form-required">Chapter</label>
                <select required name="chapters" class="form-select @error('chapters') is-invalid @enderror" id="chapters">
                  <option selected hidden disabled>Choose Chapter...</option>
                  @foreach ($data['chapters'] as $chapter)
                    <option value="{{ $chapter }}">{{ $chapter }}</option>
                  @endforeach
                </select>
                @error('chapters')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="audio_tracks" class="form-label">Audio tracks</label>
                <input name="audio_tracks" type="text" class="form-control @error('audio_tracks') is-invalid @enderror" id="audio_tracks" placeholder="ACC 2.0 [...]">
                @error('audio_tracks')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-2">
                <label for="episode" class="form-label form-required">Episode</label>
                <input required autocomplete="off" step="0.1" name="episode" type="number" min="0" class="form-control @error('episode') is-invalid @enderror" id="episode" placeholder="00">
                @error('episode')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-5">
                <label for="origin" class="form-label form-required">Origin</label>
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
              <div class="col-md-5">
                <label for="type" class="form-label form-required">Type</label>
                <select required name="type" class="form-select @error('type') is-invalid @enderror" id="type">
                  <option selected hidden disabled>Choose Type...</option>
                  @foreach ($data['types'] as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                  @endforeach
                </select>
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-2 d-flex align-items-end">
                <label for="bd" class="form-label"></label>
                <div class="form-check">
                  <input name="bd" value="1" class="form-check-input @error('bd') is-invalid @enderror" type="checkbox" id="bd">
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
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form><!-- End General -->
        
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection