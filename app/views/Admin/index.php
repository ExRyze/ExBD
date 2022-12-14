<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="d-flex flex-column">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-secondary text-center mb-3">Database</h2>
    <article class="d-flex flex-wrap gap-3 mb-3">
      <?php foreach($data['database'] as $table) { ?>
      <a href="<?= BASE_URL.'/admin/'.$table['key'] ?>" class="card-table card bg-white text-dark text-decoration-none">
        <div class="card-header"><h5 class="m-0 text-center"><?= $table['key'] ?></h5></div>
        <div class="card-body d-flex gap-3 align-items-center">
          <img src=<?= PUBLIC_URL."/img/logo_ex_red.png" ?> width="40" height="40">
          <div class="d-flex flex-column flex-grow-1 gap-1">
            <?php $index = 0;
            foreach($table['value'] as $row) {$index += $row['index'];}
            echo "<h5 class='col-12 text-center m-0'>{$index} <span class='fw-normal'>{$table['key']}</span></h5>
            <div class='col-12 border-bottom border-3 border-dark'></div>     <div class='d-flex gap-2'>";
            foreach($table['value'] as $row) {echo "<h6 class='flex-grow-1 m-0 text-center'>{$row['index']} <span class='fw-normal'>{$row[$table['by']]}</span></h6>";}
            echo "</div>"; ?>
          </div>
        </div>
      </a>
      <?php } ?>
    </article>
  </main>
</div>

<?php require_once MAIN_FOOT ?>