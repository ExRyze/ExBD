<?php require_once ADMIN_HEAD ?>
<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 col-11 d-flex flex-column">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark text-center mb-3">Table Animes</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex mb-3">
      <a href="<?= BASE_URL.'/animes/add' ?>" class="btn btn-primary">Add</a>
    </div>
    <div class="mb-3 col-12 overflow-auto border border-3 border-dark">
      <table class="table m-0 table-bordered border-dark table-hover">
        <thead class="bg-secondary text-center">
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Aliases</th>
            <th>Episodes</th>
            <th>Type</th>
            <th>Aired</th>
            <th>Finished</th>
            <th>Genres</th>
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
            <td><?php foreach($data['animes_aliases'] as $alias) {
              if($row['id'] === $alias['anime_id']) {
                echo "<p class='m-0'><strong>{$alias['origin_alias']}:</strong> {$alias['anime_alias']}</p>";
                unset($alias);
              }
            } echo "<a role='button' class='btn btn-primary btn-add-alias' data-bs-toggle='modal' data-bs-target='#modalAddAlias' id='{$row['id']}'>Add alias</a>" ?></td>
            <td><?= $row['episodes'].' episodes' ?></td>
            <td><?= $row['type'] ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($row['aired'])) ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($row['finished'])) ?></td>
            <td><?php foreach($data['animes_genres'] as $genre) {
              echo "";
              if($row['id'] === $genre['anime_id']) {
                echo "{$genre['genre']}, ";
                unset($genre);
              }
              
            } echo "<a role='button' class='btn btn-primary btn-add-alias' data-bs-toggle='modal' data-bs-target='#modalAddAlias' id='{$row['id']}'>Add Genre</a>" ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($row['created_at'])) ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($row['updated_at'])) ?></td>
            <td><?= $row['id_user'] ?></td>
            <td><?= (file_exists(STORAGE_URL)) ? ((file_exists(STORAGE_ANIMES.'/'.$row['title'])) ? 'Exists' : 'Not exists') : "Drive 'F:' doesn't exists" ?></td>
            <td>
              <div class="d-flex gap-3">
                <a href="<?= BASE_URL.'/animes/edit/'.$row['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="<?= BASE_URL.'/animes/delete/'.$row['id'] ?>" class="btn btn-danger">Delete</a>
              </div>
            </td>
          </tr>
        <?php $index += 1; } ?>
        </tbody>
        <tfoot class="bg-secondary m-0 text-center">
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Aliases</th>
            <th>Episodes</th>
            <th>Type</th>
            <th>Aired</th>
            <th>Finished</th>
            <th>Genres</th>
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

<div class="modal fade" id="modalAddAlias" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/aliases/animes' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Alias</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="aliasAnimeId">
        <div class="form-group mb-3">
          <label for="origin" class="form-label">Origin alias</label>
          <input type="text" name="origin" id="origin" class="form-control">
        </div>
        <div class="form-group">
          <label for="alias" class="form-label">Anime alias</label>
          <input type="text" name="alias" id="alias" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>


<?php require_once ADMIN_FOOT ?>