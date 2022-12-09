<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 col-11 overflow-hidden d-flex flex-column dropdown">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark text-center mb-3">Table Users</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex mb-3">
      <a role="button" data-bs-toggle="modal" data-bs-target="#modalAddAdmin" class="btn btn-primary">Add Admin</a>
    </div>
    <div class="mb-3 col-12 overflow-auto border border-3 border-dark">
      <table class="table m-0 table-bordered border-dark table-hover">
        <thead class="bg-secondary text-center">
          <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Name</th>
            <th>Role</th>
            <th>Access</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="m-0">
          <?php $index = 1;
          foreach($data['users'] as $row) { ?>
          <tr>
            <td><?= $index ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['role'] ?></td>
            <td><?= $row['access'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($row['created_at'])) ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($row['updated_at'])) ?></td>
            <td>
              <div class="d-flex gap-3">
                <?php if($row['role'] === 'Admin') { ?>
                  <a href="<?= BASE_URL.'/users/edit/'.$row['id'] ?>" class="btn btn-warning">Edit</a>
                <?php } ?>
                <?php if($row['status'] === 'Active') { ?>
                  <a href="<?= BASE_URL.'/users/suspend/'.$row['id'] ?>" class="btn btn-warning">Suspend</a>
                <?php } else if ($row['status'] === 'Suspended') { ?>
                  <a href="<?= BASE_URL.'/users/active/'.$row['id'] ?>" class="btn btn-success">Active</a>
                <?php } ?>
                <a href="<?= BASE_URL.'/users/delete/'.$row['id'] ?>" class="btn btn-danger">Delete</a>
              </div>
            </td>
          </tr>
          <?php $index += 1; } ?>
        </tbody>
        <tfoot class="bg-secondary m-0 text-center">
          <th>No.</th>
          <th>Username</th>
          <th>Name</th>
          <th>Role</th>
          <th>Access</th>
          <th>Status</th>
          <th>Created at</th>
          <th>Updated at</th>
          <th>Action</th>
        </tfoot>
      </table>
    </div>
  </main>
</div>

<div class="modal fade" id="modalAddAdmin" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL."/register/admin" ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5>Add Admin</h5>
        <a class="btn-close" data-bs-dismiss="modal"></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="role" value="Admin">
        <div class="form-group mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<?php require_once MAIN_FOOT ?>