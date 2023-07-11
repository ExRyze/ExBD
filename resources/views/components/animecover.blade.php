@if ($anime->image === null || !Storage::disk('local')->exists('/public/images/animes/'.$anime->slug."/".$anime->image))
<img src="{{ url("storage/images/animes/ex-default/Cover.jpg") }}" alt="{{ $anime->title }}" class="card-preview" loading="lazy">
@else
<img src="{{ url("storage/images/animes/".$anime->slug."/"."$anime->image") }}" alt="{{ $anime->title }}" class="card-preview" loading="lazy">
@endif