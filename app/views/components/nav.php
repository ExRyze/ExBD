<nav class="navbar px-3 py-2 bg-primary d-flex justify-content-start align-items-center">
  <a href="<?= BASE_URL ?>" class="d-flex justify-content-start align-items-center gap-3 text-white text-decoration-none">
    <img src="img/logo_ex_red.png" alt="Logo_EX.png" width="40" height="40">
    <h2 class="m-0">EXBD</h2>
  </a>
  <ul class="navbar-nav mx-auto d-flex flex-row">
    <li class="nav-item">
      <a href="<?= BASE_URL ?>" class="nav-link text-white px-2">Anime</a>
    </li>
    <li class="nav-item">
      <a href="<?= BASE_URL ?>" class="nav-link text-white px-2">Manga</a>
    </li>
    <li class="nav-item">
      <a href="<?= BASE_URL ?>" class="nav-link text-white px-2">Light Novel</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link text-white px-2 dropdown-toggle" role="button" id="dropProfile" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
      <ul class="dropdown-menu position-absolute mt-2" aria-labelledby="dropProfile">
        <a class="dropdown-item" href="<?= BASE_URL ?>/admin">Admin Site</a>
        <a class="dropdown-item text-danger" href="<?= BASE_URL.'/login/logout' ?>">Logout</a>
      </ul>
    </li>
  </ul>
</nav>