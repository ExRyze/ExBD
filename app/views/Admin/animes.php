<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 flex-grow-1 d-flex flex-column">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark text-center mb-3">Table Animes</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex mb-3">
      <a href="<?= BASE_URL.'/animes/add' ?>" class="btn btn-primary">Add</a>
    </div>
    <table class="table table-bordered border border-3 border-dark table-hover">
      <thead class="border-3 bg-secondary">
        <th>ID</th>
        <th>Title</th>
        <th>Episodes</th>
        <th>Type</th>
        <th>Aired</th>
        <th>Finished</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>id_user</th>
      </thead>
      <?php foreach($data['animes'] as $row) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['title'] ?></td>
        <td><?= $row['episodes'] ?></td>
        <td><?= $row['type'] ?></td>
        <td><?= $row['aired'] ?></td>
        <td><?= $row['finished'] ?></td>
        <td><?= $row['created_at'] ?></td>
        <td><?= $row['updated_at'] ?></td>
        <td><?= $row['id_user'] ?></td>
      </tr>
      <?php } ?>
      <tfoot class="border-3 bg-secondary">
        <th>ID</th>
        <th>Title</th>
        <th>Episodes</th>
        <th>Type</th>
        <th>Aired</th>
        <th>Finished</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>id_user</th>
      </tfoot>
    </table>
  </main>
</div>

<?php require_once MAIN_FOOT ?>