@extends('templates.index')

@section('main')

  @include('components.pagetitle')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card bg-white text-dark">
          <div class="card-body">
            <h5 class="card-title">{{ end($page['arr']) }} Table</h5>
            <a class="btn btn-success mb-2" href="{{ url("dashboard/user/add") }}">
              <i class="bi bi-plus-lg"></i>
              Add
            </a>

            <!-- Table with stripped rows -->
            <table class="table datatable table-bordered">
              <thead>
                <tr>
                  <th scope="col">Action</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Date Created</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($table as $iuser => $user)
                  <tr>
                    <th scope="row">
                      <a class="btn btn-warning" href="">
                        <i class="bi bi-exclamation-triangle"></i>
                        Edit
                      </a>
                      <a class="btn btn-danger" href="">
                        <i class="bi bi-exclamation-octagon"></i>
                        Delete
                      </a>
                    </th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ date("Y-m-d h:i:s A", strtotime($user->created_at)) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection