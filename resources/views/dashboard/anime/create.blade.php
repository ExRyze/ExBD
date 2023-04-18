@extends('templates.index')

@section('main')

  @include('components.pagetitle')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <a class="btn btn-danger mb-2" href="{{ url("dashboard/anime") }}">
              <i class="bi bi-box-arrow-left"></i>
              Back
            </a>
        
            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" action="/dashboard/anime/store">
              @csrf
              <div class="col-md-12">
                <label for="title" class="form-label">Title</label>
                <input required name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Anime's Title...">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="type" class="form-label">Type Anime</label>
                <select name="type" class="form-select @error('type') is-invalid @enderror" id="type">
                  <option selected hidden disabled>Choose Type...</option>
                  @foreach ($data['type'] as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                  @endforeach
                </select>
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="episodes" class="form-label">Episodes</label>
                <input name="episodes" type="number" min="0" class="form-control @error('episodes') is-invalid @enderror" id="episodes" placeholder="Episodes">
                @error('episodes')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="duration" class="form-label">Duration</label>
                <input name="duration" type="number" min="0" class="form-control @error('duration') is-invalid @enderror" id="duration" placeholder="min/eps">
                @error('duration')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="source" class="form-label">Source</label>
                <select name="source" class="form-select @error('source') is-invalid @enderror" id="source">
                  <option selected hidden disabled>Choose Source...</option>
                  @foreach ($data['source'] as $source)
                    <option value="{{ $source }}">{{ $source }}</option>
                  @endforeach
                </select>
                @error('source')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="status" class="form-label">Status Anime</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                  <option selected hidden disabled>Choose Source...</option>
                  @foreach ($data['status'] as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                  @endforeach
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="aired" class="form-label">Date Aired</label>
                <input name="aired" type="date" class="form-control @error('aired') is-invalid @enderror" id="aired" placeholder="Anime's Type...">
                @error('aired')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="finished" class="form-label">Date Finished</label>
                <input name="finished" type="date" class="form-control @error('finished') is-invalid @enderror" id="finished" placeholder="Anime's Type...">
                @error('finished')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              {{-- <div class="col-3">
                <div class="col-md-12">
                  <label for="image" class="form-label">Image</label>
                  <input name="image" type="text" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Anime's Title...">
                  @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div> --}}
              <div class="col-12">
                <div class="col-md-12">
                  <label for="description" class="form-label">Description</label>
                  <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Anime's Description..."></textarea>
                  @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form><!-- End Multi Columns Form -->
        
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection