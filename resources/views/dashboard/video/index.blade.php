@extends('templates.index')
{{-- {{ dd($table[0]->videos->count()) }} --}}
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

            <a class="btn btn-info mb-2" href="{{ url("dashboard/video/history/anime/$table->slug") }}">
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
                    <th scope="col">Cover</th>
                    <th scope="col">Date Updated</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($table->folder->videos->reverse() as $ivideo => $video)
                    @php 
                      $title = (str_replace(' ', '_', strtolower($table->folder->slug." Ep ".(strlen($video->episode) === 1 ? "0".$video->episode : $video->episode)." - ".$video->origin." ".(explode('x', $video->resolution)[1])."p.".$video->type)));
                    @endphp
                    {{-- If too long --}}
                    <tr>
                      <th scope="row">
                        <a class="btn btn-warning" href="{{ url("dashboard/anime/video/$table->slug/edit/$title") }}">
                          <i class="ri ri-edit-2-line"></i>
                          Edit
                        </a>
                        <form class="d-inline" action="/dashboard/anime/video/{{ $table->slug }}/approve" method="post">
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
                      @php 
                        $title = $table->folder->slug." Ep ".(strlen($video->episode) === 1 ? "0".$video->episode : $video->episode)." - ".$video->origin." ".($table->type === "TV" ? ($video->approved === 0 ? "TV" : "TV") : $table->type)." ".(explode('x', $video->resolution)[1])."p.".$video->type;
                      @endphp
                      <td>
                        <button class="btn btn-success bg-transparent border-0 text-dark" id="copy">{{ strlen($title) > 255 ? "Title too long" : $title  }}</button>
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
                      <td><em>{{ $video->cover === 0 ? "False" : "True" }}</em></td>
                      <td>{{ date("M d, Y h:i:s A", strtotime($video->updated_at)) }}</td>
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="{{ url("dashboard/anime/video/$table->slug/delete/$video->id") }}">Delete</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection