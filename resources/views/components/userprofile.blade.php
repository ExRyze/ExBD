@if ($user->image === null || !Storage::disk('local')->exists('/public/images/users/'.$user->image))
<img id="imgPrev" src="{{ url("storage/images/users/ex-default.jpg") }}" alt="" width="100%" style="aspect-ratio: 1/1;" loading="lazy" class="rounded-circle">
@else
<img id="imgPrev" src="{{ url("storage/images/users/".$user->image) }}" alt="" width="100%" style="aspect-ratio: 1/1;" loading="lazy" class="rounded-circle">
@endif