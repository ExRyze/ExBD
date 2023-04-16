@extends('templates.index')

@section('main')

  @include('components.pagetitle')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <a class="btn btn-danger mb-2" href="{{ url("dashboard/user") }}">
              <i class="bi bi-box-arrow-left"></i>
              Back
            </a>
        
            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" action="/dashboard/user/update/{{ $data->id }}">
              @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Username</label>
                <input disabled value="{{ $data->username }}" type="text" class="form-control @error('username') is-invalid @enderror" id="inputName5" placeholder="Your Username...">
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Email</label>
                <input disabled value="{{ $data->email }}" type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail5" placeholder="Youremail@example.com">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Role</label>
                <select required name="role" id="inputState" class="form-select @error('role') is-invalid @enderror">

                  {{-- Guest --}}
                  @if ($data->role === "User")
                    <option selected value="User">User</option>
                  @else
                    <option value="User">User</option>
                  @endif

                  {{-- Staff --}}
                  @if ($data->role === "Staff")
                    <option selected value="Staff">Staff</option>
                  @else
                    <option value="Staff">Staff</option>
                  @endif

                  {{-- Admin --}}
                  @if ($data->role === "Admin")
                    <option selected value="Admin">Admin</option>
                  @else
                    <option value="Admin">Admin</option>
                  @endif

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