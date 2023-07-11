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

            <a class="btn btn-success mb-2" href="{{ url("dashboard/anime/create") }}">
              <i class="bi bi-plus-lg"></i>
              Create
            </a>

            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table datatable table-bordered table-hover" style="white-space: nowrap;">
                <thead>
                  <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Episodes</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Source</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date Aired</th>
                    <th scope="col">Date Finished</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Date Updated</th>
                    <th scope="col">User</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($table as $ianime => $anime)
                    <tr>
                      <th scope="row">
                        <a class="btn btn-info" href="{{ url("anime/".$anime->slug) }}">
                          <i class="bi bi-info-circle"></i>
                          Info
                        </a>
                        <a class="btn btn-warning" href="{{ url("dashboard/anime/edit/".$anime->slug) }}">
                          <i class="ri ri-edit-2-line"></i>
                          Edit
                        </a>
                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DelAnime{{ $ianime }}">
                          <i class="bi bi-trash"></i>
                          Delete
                        </button>
                      </th>
                      <td>{{ $anime->title }}</td>
                      <td>{{ $anime->type }}</td>
                      <td>{{ $anime->episodes }}</td>
                      <td>{{ $anime->duration }} <small>min./ep.</small></td>
                      <td>{{ $anime->source }}</td>
                      <td>{{ $anime->status }}</td>
                      @if (!is_null($anime->date_aired))
                      <td>{{ date("M d, Y", strtotime($anime->date_aired)) }}</td>
                      @else
                      <td><em>NULL</em></td>
                      @endif
                      @if (!is_null($anime->date_finished))
                      <td>{{ date("M d, Y", strtotime($anime->date_finished)) }}</td>
                      @else
                      <td><em>NULL</em></td>
                      @endif
                      <td>{{ date("M d, Y h:i:s A", strtotime($anime->created_at)) }}</td>
                      <td>{{ date("M d, Y h:i:s A", strtotime($anime->updated_at)) }}</td>
                      <td>{{ $anime->user->username }}</td>
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

  
  @foreach ($table as $ianime => $anime)
  <div class="modal fade text-dark" id="DelAnime{{ $ianime }}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete <strong>{{ $anime->title }}</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure deleting this data anime. <strong>Some data from other tables might be deleted too</strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="{{ url("dashboard/anime/delete/".$anime->slug) }}">Delete</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection