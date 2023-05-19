<div class="pagetitle">
  <h1>{{ end($page['arr']) }}</h1>
  <nav>
    <ol class="breadcrumb">
      @if (sizeof($page['arr']) === 1)
        <li class="breadcrumb-item active"><a href="/">Home</a></li>
      @else
        @foreach ($page['arr'] as $ipg => $pg)
          @if ($ipg === ((sizeof($page['arr'])-1)))
            @break
          @elseif ($ipg === 0)
            <li class="breadcrumb-item"><a href="{{ url("/") }}">{{ $pg }}</a></li>
          @elseif (str_contains($pg, '_'))
            <li class="breadcrumb-item"><a href="{{ url($page['path'].="/".strtolower($pg)) }}">{{ str_replace('_', ' ', $pg) }}</a></li>
          @else
            <li class="breadcrumb-item"><a href="{{ url($page['path'].="/".strtolower($pg)) }}">{{ $pg }}</a></li>
          @endif
        @endforeach
        <li class="breadcrumb-item active">{{ end($page['arr']) }}</li>
      @endif
    </ol>
  </nav>
</div><!-- End Page Title -->