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
            <form class="row g-3" method="post" action="/dashboard/user/add">
              @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Username</label>
                <input required type="text" class="form-control" id="inputName5" placeholder="Your Username...">
              </div>
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Email</label>
                <input required type="email" class="form-control" id="inputEmail5" placeholder="Youremail@gmail.com">
              </div>
              <div class="col-md-6">
                <label for="inputPassword5" class="form-label">Password</label>
                <input required type="password" class="form-control" id="inputPassword5" placeholder="Your Password">
              </div>
              <div class="col-md-4">
                <label for="inputState" class="form-label">Role</label>
                <select required id="inputState" class="form-select">
                  <option selected hidden disabled>Choose Role...</option>
                  <option value="User">User</option>
                  <option value="Staff">Staff</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End Multi Columns Form -->
        
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection