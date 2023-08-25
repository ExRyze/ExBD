@extends('templates.index')

@section('main')

  @include('components.pagetitle')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card bg-white text-dark">
          <div class="card-body">
            <h5 class="card-title">{{ $table->folder->slug }} Folder</h5>

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

            <a class="btn btn-warning mb-2" href="{{ url("dashboard/anime/folder") }}">
              <i class="bi bi-folder"></i>
              Folders
            </a>

            <a class="btn btn-info mb-2" href="{{ url("dashboard/anime/history/video/$table->slug") }}">
              <i class="bi bi-clock-history"></i>
              History
            </a>

            <a class="btn btn-success mb-2" href="{{ url("dashboard/anime/video/$table->slug/create") }}">
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
                    <th scope="col">Subtitles</th>
                    <th scope="col">Mistakes</th>
                    <th scope="col">Lenght Video</th>
                    <th scope="col">Resolution</th>
                    <th scope="col">Chapters</th>
                    <th scope="col">Video Tracks</th>
                    <th scope="col">Audio Tracks</th>
                    <th scope="col">Size</th>
                    <th scope="col">Date Updated</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($table->folder->videos->reverse() as $ivideo => $video)
                    @php 
                      $episode = (strlen($video->episode) === 1 ? "0".$video->episode : $video->episode);
                      $bd = $video->format;
                      $type = ($table->type === "TV" ? $bd : $table->type." ".$bd);
                      $res = explode('x', $video->resolution);
                      switch (true) {
                        case $res[0] === "7680" && $res[1] === "4320" :
                          $resolution = "8K";
                          break;
                        case $res[0] === "3840" && $res[1] === "2160" :
                          $resolution = "4K";
                          break;
                        case $res[0] === "2560" && $res[1] === "1440" :
                          $resolution = "2K";
                          break;
                        
                        default:
                          $resolution = $res[1]."p";
                          break;
                      }
                      $title = $table->folder->slug." Ep ".$episode." - ".$video->origin." ".$type." ".$resolution.".".$video->type;
                      $path = str_replace(' ', '_', strtolower($title));
                    @endphp
                    {{-- If too long --}}
                    <tr>
                      <th scope="row">
                        <a class="btn btn-warning mb-1" href="{{ url("dashboard/anime/video/$table->slug/edit/$path") }}">
                          <i class="ri ri-edit-2-line"></i>
                          Edit
                        </a><br>
                        <form class="mb-1" action="/dashboard/anime/video/{{ $table->slug }}/approve" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{ $video->id }}">
                          @if ($video->approved === 0)
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
                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DelVideo{{ $ivideo }}">
                          <i class="bi bi-trash"></i>
                          Delete
                        </button>
                      </th>
                      <td>
                        @if (strlen($title) > 255)
                        <button class="btn btn-success bg-transparent border-0 text-dark">Title too long</button>
                        @else
                        <button class="btn btn-success bg-transparent border-0 text-dark" id="copy" rtrim="-4">{{ $title }}</button>
                        @endif
                      </td>
                      <td>
                        @foreach ($video->subtitles as $subtitle)
                          <p class="m-0">{{ $subtitle->origin.': '.$subtitle->subtitle }}</p>
                        @endforeach
                      </td>
                      <td>
                        @foreach ($video->mistakes as $mistake)
                          <p class="m-0">{{ $mistake->mistake->mistake }}</p>
                        @endforeach
                      </td>
                      <td>{{ $video->lenght_video }}</td>
                      <td>{{ $video->resolution }}</td>
                      <td>{{ $video->chapters }}</td>
                      <td>{{ $video->video_tracks }}</td>
                      <td>{{ $video->audio_tracks }}</td>
                      <td>{{ $video->size }} MB</td>
                      <td>{{ date("Y-m-d H:i:s", strtotime($video->updated_at)) }}</td>
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

  @foreach ($table->folder->videos as $ivideo => $video)
  <div class="modal fade text-dark" id="DelVideo{{ $ivideo }}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Eps. <strong>{{ $video->episode }} - {{ $video->origin }}</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure deleting this data video. <strong>Data video will stored in history</strong>
        </div>
        <div class="modal-footer">
          <form action="/dashboard/anime/video/{{ $table->slug }}/delete" method="post" class="mb-1">
            @csrf
            <input type="hidden" name="id" value="{{ $video->id }}">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancel</button>
            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection