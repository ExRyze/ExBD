<nav class="navbar sticky-top px-4 py-2 bg-secondary d-flex justify-content-start align-items-center border-bottom border-3 border-dark">
  <a href="<?= BASE_URL ?>" class="d-flex justify-content-start align-items-center gap-4 text-dark text-decoration-none">
    <img src=<?= PUBLIC_URL."/img/logo_ex_red.png" ?> alt="Logo_EX.png" width="40" height="40">
    <h2 class="m-0">EXBD</h2>
  </a>
  <ul class="navbar-nav d-flex flex-row ms-auto">
    <li class="nav-item">
      <a href="<?= BASE_URL.'/animes/list' ?>" class="nav-link text-dark px-2">Animes</a>
    </li>
    <li class="nav-item">
      <a href="<?= BASE_URL ?>" class="nav-link text-dark px-2">Manga</a>
    </li>
    <li class="nav-item">
      <a href="<?= BASE_URL ?>" class="nav-link text-dark px-2">Light Novel</a>
    </li>
    <?php if(isset($_SESSION['user'])) { ?>
    <li class="nav-item dropdown">
      <a class="nav-link text-dark px-2 d-flex gap-2" role="button" id="dropProfile" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= $_SESSION['user']['username'] ?>
        <img src=<?= PUBLIC_URL."/img/logo_ex_red.png" ?> alt="profile.png" width="24" height="24">
      </a>
      <ul class="dropdown-menu dropdown-menu-end position-absolute mt-2" aria-labelledby="dropProfile">
        <?= ($_SESSION['user']['role'] === 'Admin') ? "<a class='dropdown-item' href='".BASE_URL."/admin'>Admin Site</a>" : '' ?>
        <a class="dropdown-item text-danger" href="<?= BASE_URL.'/login/logout' ?>">Logout</a>
      </ul>
    </li>
    <?php } else { ?>
    <li class="nav-item">
      <a href="<?= BASE_URL ?>/login" class="nav-link text-dark px-2">Login</a>
    </li>
    <?php } ?>
  </ul>
</nav>