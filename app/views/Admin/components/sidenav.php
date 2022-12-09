<div class="sticky-top sidenav bg-secondary col-1">
  <div class="sidenav-menu">
    <a href="<?= BASE_URL.'/admin' ?>" class="sidenav-item position-relative <?= ($data['page'] === 'EXBD | Admin - Database') ? 'active' : '' ?>">
      <img class="sidenav-logo" src=<?= PUBLIC_URL."/img/logo_ex_red.png" ?> width="40" height="40"></img>
      <h6 class="sidenav-text m-0">Database</h6>
    </a>
    <a href="<?= BASE_URL.'/admin/users' ?>" class="sidenav-item position-relative <?= ($data['page'] === 'EXBD | Admin - Users') ? 'active' : '' ?>">
      <img class="sidenav-logo" src=<?= PUBLIC_URL."/img/logo_ex_red.png" ?> width="40" height="40"></img>
      <h6 class="sidenav-text m-0">Users</h6>
    </a>
    <a href="<?= BASE_URL.'/admin/animes' ?>" class="sidenav-item position-relative <?= ($data['page'] === 'EXBD | Admin - Animes') ? 'active' : '' ?>">
      <img class="sidenav-logo" src=<?= PUBLIC_URL."/img/logo_ex_red.png" ?> width="40" height="40"></img>
      <h6 class="sidenav-text m-0">Animes</h6>
    </a>
  </div>
</div>