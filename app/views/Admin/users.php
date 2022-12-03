<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 flex-grow-1 overflow-hidden d-flex flex-column dropdown">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark text-center mb-3">Table Users</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex mb-3">
      <a href="<?= BASE_URL ?>" class="btn btn-primary">Add</a>
    </div>
    <div class="mb-3 col-12 overflow-auto border border-3 border-dark">
      <table class="table m-0 table-bordered border-dark table-hover">
        <thead class="bg-secondary text-center">
          <tr>
            <th>ID</th>
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
          <?php foreach($data['users'] as $row) { ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['role'] ?></td>
            <td><?= $row['access'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td><?= $row['updated_at'] ?></td>
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
          <?php } ?>
        </tbody>
        <tfoot class="bg-secondary text-center m-0">
          <th>ID</th>
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

<?php require_once MAIN_FOOT ?>