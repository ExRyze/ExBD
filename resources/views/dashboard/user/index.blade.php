@extends('templates.index')

@section('main')

  @include('components.pagetitle')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card bg-white text-dark">
          <div class="card-body">
            <h5 class="card-title">{{ end($page['arr']) }} Table</h5>

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <a class="btn btn-success mb-2" href="{{ url("dashboard/user/create") }}">
              <i class="bi bi-plus-lg"></i>
              Create
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
                      <a class="btn btn-warning" href="{{ url("/dashboard/user/edit/".$user->username) }}">
                        <i class="bi bi-exclamation-triangle"></i>
                        Edit
                      </a>
                      <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DelUser{{ $iuser }}">
                        <i class="bi bi-exclamation-octagon"></i>
                        Delete
                      </button>
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

  
  @foreach ($table as $iuser => $user)
  <div class="modal fade text-dark" id="DelUser{{ $iuser }}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete <strong>{{ $user->username }}</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure deleting this data user. <strong>Some data from other tables might be deleted too</strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="{{ url("dashboard/user/delete/".$user->username) }}">Delete</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection