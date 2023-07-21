@extends('templates.index')
{{-- {{ dd($table) }} --}}
@section('main')

  @include('components.pagetitle')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card bg-white text-dark">
          <div class="card-body">
            <h5 class="card-title">Histories</h5>

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <a class="btn btn-warning mb-2" href="{{ url("dashboard/anime/video/$slug") }}">
              <i class="bi bi-folder"></i>
              Folder
            </a>

            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table datatable table-bordered table-hover" style="white-space: nowrap;">
                <thead>
                  <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Folder</th>
                    <th scope="col">Episode</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Type</th>
                    <th scope="col">Subtitles</th>
                    <th scope="col">Mistakes</th>
                    <th scope="col">Lenght Video</th>
                    <th scope="col">Resolution</th>
                    <th scope="col">Chapters</th>
                    <th scope="col">Video Tracks</th>
                    <th scope="col">Audio Tracks</th>
                    <th scope="col">Size</th>
                    <th scope="col">Blu-ray</th>
                    <th scope="col">Approved</th>
                    <th scope="col">Date Updated</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($table as $ihistory => $history)
                    <tr>
                      <th scope="row">
                        <form action="/dashboard/anime/history/video/{{ $history->slug }}/retrieve" method="post" class="mb-1">
                          @csrf
                          <input type="hidden" name="id" value="{{ $history->id }}">
                          <button type="submit" class="btn btn-warning"><i class="bx bx-reset"></i> Retrieve</button>
                        </form>
                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DelHistory{{ $ihistory }}">
                          <i class="bi bi-trash"></i>
                          Delete
                        </button>
                      </th>
                      <td>{{ $history->slug }}</td>
                      <td>{{ $history->episode }}</td>
                      <td>{{ $history->origin }}</td>
                      <td>{{ $history->type }}</td>
                      <td>
                        @foreach ($history->subtitles as $subtitle)
                          <p class="m-0">{{ $subtitle->origin.': '.$subtitle->subtitle }}</p>
                        @endforeach
                      </td>
                      <td>
                        @foreach ($history->mistakes as $mistake)
                          <p class="m-0">{{ $mistake->mistake->mistake }}</p>
                        @endforeach
                      </td>
                      <td>{{ $history->lenght_video }}</td>
                      <td>{{ $history->resolution }}</td>
                      <td>{{ $history->chapters }}</td>
                      <td>{{ $history->video_tracks }}</td>
                      <td>{{ $history->audio_tracks }}</td>
                      <td>{{ $history->size }}</td>
                      <td><em>{{ $history->bd === 0 ? "False" : "True" }}</em></td>
                      <td><em>{{ $history->approved === 0 ? "False" : "True" }}</em></td>
                      <td>{{ date("M d, Y h:i:s A", strtotime($history->updated_at)) }}</td>
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

  @foreach ($table as $ihistory => $history)
  <div class="modal fade text-dark" id="DelHistory{{ $ihistory }}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete <strong>Eps. {{ $history->episode }} - {{ $history->origin }}</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure deleting this data history. <strong>Data history will permanently deleted.</strong>
        </div>
        <div class="modal-footer">
          <form action="/dashboard/anime/history/video/{{ $history->slug }}/delete" method="post" class="mb-1">
            @csrf
            <input type="hidden" name="id" value="{{ $history->id }}">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancel</button>
            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection