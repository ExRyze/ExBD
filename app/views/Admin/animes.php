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
    <div class="mb-3 col-12 overflow-auto border border-3 border-dark">
      <table class="table m-0 table-bordered border-dark table-hover align-middle">
        <thead class="bg-secondary text-center">
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Episodes</th>
            <th>Type</th>
            <th>Aired</th>
            <th>Finished</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Id user</th>
            <th>Exists</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="m-0">
        <?php $index = 1;
        foreach($data['animes'] as $row) { ?>
          <tr>
            <td><?= $index ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['episodes'] ?></td>
            <td><?= $row['type'] ?></td>
            <td><?= $row['aired'] ?></td>
            <td><?= $row['finished'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td><?= $row['updated_at'] ?></td>
            <td><?= $row['id_user'] ?></td>
            <td><?= (file_exists(STORAGE_ANIMES.'/'.$row['title'])) ? 'Exists' : 'Not exists' ?></td>
            <td>
              <div class="d-flex gap-3">
                <a href="<?= BASE_URL.'/animes/edit/'.$row['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="<?= BASE_URL.'/animes/delete/'.$row['id'] ?>" class="btn btn-danger">Delete</a>
              </div>
            </td>
          </tr>
        <?php $index += 1; } ?>
        </tbody>
        <tfoot class="bg-secondary text-center m-0">
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Episodes</th>
            <th>Type</th>
            <th>Aired</th>
            <th>Finished</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Id user</th>
            <th>Exists</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </main>
</div>

<?php require_once MAIN_FOOT ?>