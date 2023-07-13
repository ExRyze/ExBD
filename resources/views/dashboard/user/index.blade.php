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

            @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <a class="btn btn-success mb-2" href="{{ url("dashboard/user/create") }}">
              <i class="bi bi-plus-lg"></i>
              Create
            </a>

            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table datatable table-bordered table-hover" style="white-space: nowrap;">
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
                        <a class="btn btn-warning" href="{{ url("dashboard/user/edit/".$user->username) }}">
                          <i class="ri ri-edit-2-line"></i>
                          Edit
                        </a>
                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DelUser{{ $iuser }}">
                          <i class="bi bi-trash"></i>
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
            </div>
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
          <form action="/dashboard/user/delete" method="post" class="mb-1">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancel</button>
            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection