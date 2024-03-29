<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" id="Dashboard" href="{{ url("dashboard") }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Tables</li>

    <li class="nav-item">
      <a class="nav-link collapsed" id="User" href="{{ url("dashboard/user") }}">
        <i class="bi bi-person"></i>
        <span>User</span>
      </a>
    </li><!-- End User Nav -->

    {{-- <li class="nav-item">
      <a class="nav-link " href="{{ url("dashboard/anime") }}">
        <i class="bi bi-tv"></i>
        <span>Anime</span>
      </a>
    </li><!-- End Anime Nav --> --}}

    <li class="nav-item">
      <a class="nav-link collapsed" id="Anime" data-bs-target="#components-nav" data-bs-toggle="collapse">
        <i class="bi bi-tv"></i><span>Anime</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a id="Anime" href="{{ url("dashboard/anime") }}">
            <i class="bi bi-tv"></i><span>Anime</span>
          </a>
        </li>
        <li>
          <a id="Component" href="{{ url("dashboard/theme") }}">
            <i class="bi bi-menu-button-wide"></i><span>Component</span>
          </a>
        </li>
        <li>
          <a id="Video" href="{{ url("dashboard/anime/folder") }}">
            <i class="bi bi-play-btn"></i><span>Video</span>
          </a>
        </li>
      </ul>
    </li><!-- End Files Nav -->

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#videos-nav" data-bs-toggle="collapse">
        <i class="bi bi-play-btn"></i><span>Videos</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="videos-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ url("dashboard/folder/anime") }}">
            <i class="bi bi-circle"></i><span>Anime</span>
          </a>
        </li>
      </ul>
    </li><!-- End Videos Nav --> --}}

  </ul>

</aside><!-- End Sidebar-->