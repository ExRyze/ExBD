<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 col-11 overflow-hidden d-flex flex-column dropdown">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-secondary text-center mb-3">Table Parts</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex overflow-scroll scrollbar-none">
      <?php foreach($data['database'] as $key => $table) { ?>
        <div class="col-3 px-2">
          <h5 class="col-12 pb-2 m-0 border-bottom border-2 border-secondary text-center mb-3">Table <?= ucfirst($key) ?></h5>
          <div class="col-12 d-flex mb-3">
            <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' title="" key="new" url="<?= ucfirst($table['column']) ?>">Add</a>
          </div>
          <div class="col-12 overflow-auto border border-3 border-dark">
            <table class="table m-0 table-bordered border-dark table-hover">
              <thead class="bg-secondary text-center">
                <tr>
                  <th><?= $table['column'] ?></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="m-0">
                <?php foreach($table['table'] as $row) { ?>
                <tr>
                  <td><?= $row[$table['column']] ?></td>
                  <td>
                    <div class="d-flex gap-3">
                      <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $row['id'] ?>" title="<?= $row[$table['column']] ?>" key="modify" url="<?= ucfirst($table['column']) ?>">Edit</a>
                      <form action="<?= BASE_URL.'/admin/deleteParts/'.$key ?>" method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot class="bg-secondary m-0 text-center">
                <th><?= $table['column'] ?></th>
                <th>Action</th>
              </tfoot>
            </table>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>
</div>

<div class="modal fade" id="modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0"></h5>
        <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
      </div>
      <div class="modal-body">
      </div>
    </form>
  </div>
</div>

<?php require_once ADMIN_FOOT ?>