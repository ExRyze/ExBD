@if ($anime->image === null || !Storage::disk('local')->exists('/public/images/animes/'.$anime->slug."/".$anime->image))
<img id="imgPrev" src="{{ url("storage/images/animes/ex-default/Cover.jpg") }}" alt="" width="100%" style="aspect-ratio: 255/318;" loading="lazy">
@else
<img id="imgPrev" src="{{ url("storage/images/animes/".$anime->slug."/"."$anime->image") }}" alt="" width="100%" style="aspect-ratio: 255/318;" loading="lazy">
@endif