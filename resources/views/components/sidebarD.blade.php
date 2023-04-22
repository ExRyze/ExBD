<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{ url("dashboard") }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Tables</li>

    <li class="nav-item">
      <a class="nav-link " href="{{ url("dashboard/user") }}">
        <i class="bi bi-person"></i>
        <span>User</span>
      </a>
    </li><!-- End User Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#animation-nav" data-bs-toggle="collapse">
        <i class="bi bi-play-btn"></i><span>Animation</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="animation-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ url("dashboard/anime") }}">
            <i class="bi bi-circle"></i><span>Anime</span>
          </a>
        </li>
        <li>
          <a href="{{ url("dashboard/cartoon") }}">
            <i class="bi bi-circle"></i><span>Cartoon</span>
          </a>
        </li>
      </ul>
    </li><!-- End Anime Nav -->

  </ul>

</aside><!-- End Sidebar-->