<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 flex-grow-1 d-flex flex-column">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark text-center">Database</h2>
    <article class="d-flex flex-wrap gap-3 py-3">
      <a href="<?= BASE_URL ?>" class="card-table card bg-primary text-white text-decoration-none">
        <div class="card-header"><h5 class="m-0 text-center">Users</h5></div>
        <div class="card-body d-flex gap-3 align-items-center">
          <img src="img/logo_ex_red.png" width="40" height="40">
          <div class="d-flex flex-column flex-grow-1 gap-1">
            <?php data($data['users'], 'Users', 'role') ?>
          </div>
        </div>
      </a>
      <a href="<?= BASE_URL ?>" class="card-table card bg-primary text-white text-decoration-none">
      <div class="card-header"><h5 class="m-0 text-center">Animes</h5></div>
        <div class="card-body d-flex gap-3 align-items-center">
          <img src="img/logo_ex_red.png" width="40" height="40">
          <div class="d-flex flex-column flex-grow-1 gap-1">
            <?php data($data['animes'], 'Animes', 'id') ?>
          </div>
        </div>
      </a>
    </article>
  </main>
</div>

<?php require_once MAIN_FOOT ?>
<?php function data($table, $name, $key) {
  $index = 0;
  foreach($table as $row) {
    $index += $row['index'];
  }
  echo "<h5 class='col-12 text-center m-0'>{$index} <span class='fw-normal'>$name</span></h5>
  <div class='col-12 border-bottom border-3 border-dark'></div>
  <div class='d-flex gap-2'>";
    foreach($table as $row) {
      echo "<h6 class='flex-grow-1 m-0 text-center'>{$row['index']} <span class='fw-normal'>{$row[$key]}</span></h6>";
    }
  echo "</div>";} ?>