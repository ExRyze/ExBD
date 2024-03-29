@extends('templates.index')

@section('main')

  @include('components.pagetitle')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
        
            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" action="/dashboard/user/store">
              @csrf
              <div class="col-md-12">
                <label for="username" class="form-label form-required">Username</label>
                <input required name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Your Username...">
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label form-required">Email</label>
                <input required name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Youremail@example.com">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="inputPassword5" class="form-label form-required">Password</label>
                <input required name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword5" placeholder="Your Password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="inputState" class="form-label form-required">Role</label>
                <select required name="role" id="inputState" class="form-select @error('role') is-invalid @enderror">
                  <option selected hidden disabled>Choose Role...</option>
                  @foreach ($data['roles'] as $role)
                    <option value="{{ $role }}">{{ $role }}</option>
                  @endforeach
                </select>
                @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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