@if ($anime->image === null || !Storage::disk('local')->exists('/public/images/animes/'.$anime->slug."/".$anime->image))
<img id="imgPrev" src="{{ url("storage/images/animes/ex-default/Cover.jpg") }}" alt="" width="100%">
@else
<img id="imgPrev" src="{{ url("storage/images/animes/".$anime->slug."/"."$anime->image") }}" alt="" width="100%">
@endif