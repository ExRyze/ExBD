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

        <div class="card">
          <div class="card-body" id="edit-form">
        
            <!-- General -->
            <h4>General</h4>
            <hr class="mt-0">
            <form class="row g-3 form-general" method="POST" action="/dashboard/anime/update/{{ $anime->id }}">
              @csrf
              <div class="col-md-12">
                <label for="title" class="form-label">Title</label>
                <input required value="{{ $anime->title }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Anime's Title...">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="type" class="form-label">Type Anime</label>
                <select name="type" class="form-select @error('type') is-invalid @enderror" id="type">
                  <option selected hidden disabled>Choose Type...</option>
                  @foreach ($data['types'] as $type)
                    @if ($type === $anime->type)
                      <option selected value="{{ $type }}">{{ $type }}</option>
                    @else
                      <option value="{{ $type }}">{{ $type }}</option> 
                    @endif
                  @endforeach
                </select>
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="episodes" class="form-label">Episodes</label>
                <input value="{{ $anime->episodes }}" name="episodes" type="number" min="0" class="form-control @error('episodes') is-invalid @enderror" id="episodes" placeholder="Episodes">
                @error('episodes')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="duration" class="form-label">Duration</label>
                <input value="{{ $anime->duration }}" name="duration" type="number" min="0" class="form-control @error('duration') is-invalid @enderror" id="duration" placeholder="min/eps">
                @error('duration')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="source" class="form-label">Source</label>
                <select name="source" class="form-select @error('source') is-invalid @enderror" id="source">
                  <option selected hidden disabled>Choose Source...</option>
                  @foreach ($data['sources'] as $source)
                    @if ($source === $anime->source)
                      <option selected value="{{ $source }}">{{ $source }}</option>
                    @else
                      <option value="{{ $source }}">{{ $source }}</option> 
                    @endif
                  @endforeach
                </select>
                @error('source')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="status" class="form-label">Status Anime</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                  <option selected hidden disabled>Choose Status...</option>
                  @foreach ($data['statuses'] as $status)
                    @if ($status === $anime->status)
                      <option selected value="{{ $status }}">{{ $status }}</option>
                    @else
                      <option value="{{ $status }}">{{ $status }}</option> 
                    @endif
                  @endforeach
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="date_aired" class="form-label">Date Aired</label>
                <input value="{{ $anime->date_aired }}" name="date_aired" type="date" class="form-control @error('date_aired') is-invalid @enderror" id="date_aired" placeholder="Anime's Type...">
                @error('date_aired')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="date_finished" class="form-label">Date Finished</label>
                <input value="{{ $anime->date_finished }}" name="date_finished" type="date" class="form-control @error('date_finished') is-invalid @enderror" id="date_finished" placeholder="Anime's Type...">
                @error('date_finished')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12">
                <div class="col-md-12">
                  <label for="synopsis" class="form-label">Synopsis</label>
                  <textarea rows="6" name="synopsis" class="form-control @error('synopsis') is-invalid @enderror" id="synopsis" placeholder="Anime's Description...">{{ $anime->synopsis }}</textarea>
                  @error('synopsis')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form><!-- End General -->

            <!-- Genres -->
            <h4 class="mt-5 d-flex ex-chevron collapsed" type="button" data-bs-target="#genres-form" data-bs-toggle="collapse" aria-expanded="false">
              <span>Genres</span>
              <i class="bi bi-chevron-down ms-auto"></i>
            </h4>
            <hr class="mt-0">
            <div id="genres-form" class="collapse" data-bs-parent="#edit-form">
              <form class="row g-3 form-genres" method="POST" action="/dashboard/animegenre/store">
                @csrf
                <input type="hidden" name="anime_id" value="{{ $anime->id }}">
                @foreach ($genres as $genre)
                @php $created = false; @endphp
                <div class="col-md-3 text-center">
                  @foreach ($anime->genres as $animegenre)
                    @if ($genre->id === $animegenre->genre_id)
                    <label for="{{ $genre->id }}"><input checked type="checkbox" name="genre_id[]" value="{{ $genre->id }}" id="{{ $genre->id }}">{{ $genre->genre }}</label> <br>
                    @php $created = true; @endphp
                    @endif
                  @endforeach
                  @if (!$created)
                  <label for="{{ $genre->id }}"><input type="checkbox" name="genre_id[]" value="{{ $genre->id }}" id="{{ $genre->id }}"> {{ $genre->genre }}</label> <br>
                  @endif
                </div>
                @endforeach
                @error('genre_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="text-end">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <hr>

              <form class="row g-3 form-genres" method="POST" action="/dashboard/genre/store">
                @csrf
                <input type="hidden" name="anime_id" value="{{ $anime->id }}">
                <div class="col-md-12">
                  <label for="genre" class="form-label">Genre</label>
                  <input required name="genre" type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" placeholder="Genre">
                  @error('genre')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-end">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- End Genres -->

            <!-- Themes -->
            <h4 class="mt-5 d-flex ex-chevron collapsed" type="button" data-bs-target="#themes-form" data-bs-toggle="collapse" aria-expanded="false">
              <span>Themes</span>
              <i class="bi bi-chevron-down ms-auto"></i>
            </h4>
            <hr class="mt-0">
            <div id="themes-form" class="collapse" data-bs-parent="#edit-form">
              <form class="row g-3 form-themes" method="POST" action="/dashboard/animetheme/store">
                @csrf
                <input type="hidden" name="anime_id" value="{{ $anime->id }}">
                @foreach ($themes as $theme)
                @php $created = false; @endphp
                <div class="col-md-3 text-center">
                  @foreach ($anime->themes as $animetheme)
                    @if ($theme->id === $animetheme->theme_id)
                    <label for="{{ $theme->id }}"><input checked type="checkbox" name="theme_id[]" value="{{ $theme->id }}" id="{{ $theme->id }}">{{ $theme->theme }}</label> <br>
                    @php $created = true; @endphp
                    @endif
                  @endforeach
                  @if (!$created)
                  <label for="{{ $theme->id }}"><input type="checkbox" name="theme_id[]" value="{{ $theme->id }}" id="{{ $theme->id }}"> {{ $theme->theme }}</label> <br>
                  @endif
                </div>
                @endforeach
                @error('theme_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="text-end">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <hr>

              <form class="row g-3 form-themes" method="POST" action="/dashboard/theme/store">
                @csrf
                <input type="hidden" name="anime_id" value="{{ $anime->id }}">
                <div class="col-md-12">
                  <label for="theme" class="form-label">Theme</label>
                  <input required name="theme" type="text" class="form-control @error('theme') is-invalid @enderror" id="theme" placeholder="Theme">
                  @error('theme')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-end">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- End Themes -->

            <!-- Aliases -->
            <h4 class="mt-5 d-flex ex-chevron collapsed" type="button" data-bs-target="#aliases-form" data-bs-toggle="collapse" aria-expanded="false">
              <span>Aliases</span>
              <i class="bi bi-chevron-down ms-auto"></i>
            </h4>
            <hr class="mt-0">
            <div id="aliases-form" class="collapse" data-bs-parent="#edit-form">
              @foreach ($anime->aliases as $alias)
              <form class="row g-3 form-aliases" method="POST" action="/dashboard/animealias/update/{{ $alias->id }}">
                @csrf
                <div class="col-md-3">
                  <label for="origin" class="form-label">Origin Alias</label>
                  <select name="origin" class="form-select @error('origin') is-invalid @enderror" id="origin">
                    <option required selected hidden disabled>Choose Origin...</option>
                    @foreach ($data['origins'] as $origin)
                      @if ($origin === $alias->origin)
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
                  <label for="alias" class="form-label">Alias</label>
                  <input required value="{{ $alias->alias }}" name="alias" type="text" class="form-control @error('alias') is-invalid @enderror" id="alias" placeholder="Alias">
                  @error('alias')
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

              <form class="row g-3 form-aliases" method="POST" action="/dashboard/animealias/store">
                @csrf
                <input type="hidden" name="anime_id" value="{{ $anime->id }}">
                <div class="col-md-3">
                  <label for="origin" class="form-label">Origin Alias</label>
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
                  <label for="alias" class="form-label">Alias</label>
                  <input required name="alias" type="text" class="form-control @error('alias') is-invalid @enderror" id="alias" placeholder="Alias">
                  @error('alias')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-end">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- End Aliases -->
        
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection