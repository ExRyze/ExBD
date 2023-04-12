<div class="pagetitle">
  <h1>{{ end($page['arr']) }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      @if (sizeof($page['arr']) > 1)
        @foreach ($page['arr'] as $ipg => $pg)
          @if ($ipg === sizeof($page['arr']))
            @break
          @endif
          <li class="breadcrumb-item"><a href="{{ $page['path'].="/".strtolower($pg) }}">{{ $pg }}</a></li>
        @endforeach
      @endif
      <li class="breadcrumb-item active">{{ end($page['arr']) }}</li>
    </ol>
  </nav>
</div><!-- End Page Title -->