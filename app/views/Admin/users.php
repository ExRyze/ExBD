<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 flex-grow-1 d-flex flex-column">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark text-center mb-3">Table Users</h2>
    <table class="table table-bordered border border-3 border-dark table-hover">
      <thead class="border-3 bg-secondary">
        <th>ID</th>
        <th>Username</th>
        <th>Name</th>
        <th>Role</th>
        <th>Access</th>
        <th>Created at</th>
        <th>Updated at</th>
      </thead>
      <?php foreach($data['users'] as $row) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['role'] ?></td>
        <td><?= $row['access'] ?></td>
        <td><?= $row['created_at'] ?></td>
        <td><?= $row['updated_at'] ?></td>
      </tr>
      <?php } ?>
      <tfoot class="border-3 bg-secondary">
        <th>ID</th>
        <th>Username</th>
        <th>Name</th>
        <th>Role</th>
        <th>Access</th>
        <th>Created at</th>
        <th>Updated at</th>
      </tfoot>
    </table>
  </main>
</div>

<?php require_once MAIN_FOOT ?>