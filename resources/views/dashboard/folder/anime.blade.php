@extends('templates.index')
{{-- {{ dd($table[0]->anime) }} --}}
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

            <a class="btn btn-warning mb-2" type="button" data-bs-toggle="modal" data-bs-target="#NewFolder">
              <i class="bi bi-plus-lg"></i>
              New Folder
            </a>

            <a class="btn btn-info mb-2" href="{{ url("dashboard/video/history/anime") }}">
              <i class="bi bi-clock-history"></i>
              Histories
            </a>

            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table datatable table-bordered table-hover" style="white-space: nowrap;">
                <thead>
                  <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Total Videos</th>
                    <th scope="col">Approved</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Date Updated</th>
                    <th scope="col">User</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($table as $ifolder => $folder)
                    <tr>
                      <th scope="row">
                        <a class="btn btn-info" href="{{ url("dashboard/video/anime/".$folder->anime->slug) }}">
                          <i class="bi bi-play-btn"></i>
                          Videos
                        </a>
                        <form class="d-inline" action="/dashboard/folder/anime/update" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{ $folder->id }}">
                          @if ($folder->approved === 0)
                          <button type="submit" name="submit" value="approve" class="btn btn-success">
                            <i class="bi bi-check-circle"></i>
                            Approve
                          </button>
                          @else
                          <button type="submit" name="submit" value="refuse" class="btn btn-warning">
                            <i class="bi bi-exclamation-triangle"></i>
                            Refuse
                          </button>
                          @endif
                        </form>
                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DelFolder{{ $ifolder }}">
                          <i class="bi bi-exclamation-octagon"></i>
                          Delete
                        </button>
                      </th>
                      <td>{{ $folder->slug }}</td>
                      <td>{{ $folder->videos->count() }} eps.</td>
                      <td><em>{{ $folder->approved === 0 ? "False" : "True" }}</em></td>
                      <td>{{ date("M d, Y h:i:s A", strtotime($folder->created_at)) }}</td>
                      <td>{{ date("M d, Y h:i:s A", strtotime($folder->updated_at)) }}</td>
                      <td>{{ $folder->user->username }}</td>
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

  <div class="modal fade text-dark" id="NewFolder" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <form class="modal-content" action="/dashboard/folder/anime/store" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">New Folder</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="anime" class="form-label">Anime</label>
          <select required name="anime" class="form-select" id="anime">
            <option selected hidden disabled>Choose Anime...</option>
            @foreach ($animes as $ianime => $anime)
              <option value="{{ $anime->title }}">{{ $anime->title }}</option>
            @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Create</button>
        </div>
      </form>
    </div>
  </div>

  @foreach ($table as $ifolder => $folder)
  <div class="modal fade text-dark" id="DelFolder{{ $ifolder }}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete <strong>{{ $folder->title }}</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure deleting this data folder. <strong>All data videos in this folder will stored in history</strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="{{ url("dashboard/folder/anime/delete/".$folder->id) }}">Delete</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection