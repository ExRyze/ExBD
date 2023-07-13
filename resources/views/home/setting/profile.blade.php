@extends('templates.index')
{{-- {{ dd(isset($page['arr'][1]) && $page['arr'][1] === "Setting") }} --}}

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

        <div class="card">
          <div class="card-body" id="edit-form">
        
            <!-- Profile -->
            <h4>Profile</h4>
            <hr class="mt-0">
            <form class="row g-3 form-general" method="POST" action="/setting/profile/update" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{ $user->id }}">
              <div class="col-md-3">
                <div class="mb-4">
                  @include('components.userprofile')
                </div>
                <div class="col-md-12 mb-3">
                  <label for="file" class="form-label">Image</label>
                  <input name="file" class="form-control @error('file') is-invalid @enderror" type="file" id="imgInp" accept="image/jpeg">
                  <input type="hidden" name="image" id="img" value="{{ $user->image }}">
                  @error('file')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <button type="button" id="imgRst" class="btn btn-secondary">Reset image</button>
              </div>
              <div class="col-md-9 row g-3 align-content-start">
                <div class="col-md-12">
                  <label for="username" class="form-label form-required">Username</label>
                  <input required name="username" value="{{ $user->username }}" type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Your Username...">
                  @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-12">
                  <label for="email" class="form-label form-required">Email</label>
                  <input required name="email" value="{{ $user->email }}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Youremail@example.com">
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-12">
                  <label for="bio" class="form-label">Bio</label>
                  <textarea rows="6" name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" placeholder="Tell us a little bit about yourself...">{{ $user->bio }}</textarea>
                  @error('bio')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form><!-- End Profile -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection