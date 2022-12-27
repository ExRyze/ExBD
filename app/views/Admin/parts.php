<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 col-11 overflow-hidden d-flex flex-column dropdown">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark text-center mb-3">Table Parts</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex overflow-scroll scrollbar-none">
      <?php foreach($data['database'] as $key => $table) { ?>
        <div class="col-3 px-2">
          <h5 class="col-12 pb-2 m-0 border-bottom border-2 border-dark text-center mb-3">Table <?= $key ?></h5>
          <div class="col-12 d-flex mb-3">
            <a role="button" data-bs-toggle="modal" data-bs-target=<?= '#modalAdd'.$table['column'] ?> class="btn btn-primary">Add</a>
          </div>
          <div class="mb-3 col-12 overflow-auto border border-3 border-dark">
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
                      <a role="button" data-bs-toggle="modal" data-bs-target=<?= '#modalEdit'.$table['column'].$row['id'] ?> class="btn btn-warning">Edit</a>
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

          <div class="modal fade modal-add" id=<?= 'modalAdd'.$table['column'] ?> aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <form class="modal-content" action=<?= BASE_URL.'/admin/addParts/'.$key ?> method="post">
                <div class="modal-header">
                  <h5>Add <?= $table['column'] ?></h5>
                  <a class="btn-close" data-bs-dismiss="modal"></a>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label class="form-label" for=<?= $table['column'] ?>><?= $table['column'] ?></label>
                    <input type="text" name="<?= $table['column'] ?>" id="<?= $table['column'] ?>" class="form-control">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>

          <?php foreach($table['table'] as $row) { ?>
            <div class="modal fade modal-add" id=<?= 'modalEdit'.$table['column'].$row['id'] ?> aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" action=<?= BASE_URL.'/admin/editParts/'.$key ?> method="post">
                  <div class="modal-header">
                    <h5>Add <?= $table['column'] ?></h5>
                    <a class="btn-close" data-bs-dismiss="modal"></a>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="form-group">
                      <label class="form-label" for=<?= $table['column'] ?>><?= $table['column'] ?></label>
                      <input type="text" name="<?= $table['column'] ?>" id="<?= $table['column'] ?>" class="form-control" value="<?= $row[$table['column']] ?>">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          <?php } ?>

        </div>
      <?php } ?>
    </div>
  </main>
</div>

<?php require_once ADMIN_FOOT ?>