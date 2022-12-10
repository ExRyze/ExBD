<?php require_once ADMIN_HEAD ?>
<!-- <?php var_dump($data['animes_licensors']) ?> -->
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
            <td><?php forEcho($row['id'], $data['animes_aliases'], 'alias', 'btn-add-alias', '#modalAddAlias', 'Add alias') ?></td>
            <td><?= $row['episodes'].' episodes' ?></td>
            <td><?= $row['type'] ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($row['aired'])) ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($row['finished'])) ?></td>
            <td><?php forEcho($row['id'], $data['animes_genres'], 'genre', 'btn-add-genre', '#modalAddGenre', 'Add genre') ?></td>
            <td><?php forEcho($row['id'], $data['animes_licensors'], 'licensor', 'btn-add-licensor', '#modalAddLicensor', 'Add Licensor') ?></td>
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

<!-- Modal -->
<div class="modal fade" id="modalAddAlias" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/aliases/animes' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Alias</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="aliasAnimeId">
        <div class="mb-3">
          <label for="origin" class="form-label">Origin alias</label>
          <input type="text" name="origin" id="origin" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="alias" class="form-label">Anime alias</label>
          <input type="text" name="alias" id="alias" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalAddGenre" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/genres/animes' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Genre</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="genreAnimeId">
        <div class="form-group px-2">
          <label for="genre">Genre</label>
          <select class="form-select" name="genre" id="genre" required>
            <option value="" selected hidden disabled>Select genre</option>
            <?php foreach($data['genres'] as $genre)
            echo "<option value='{$genre['id']}'>{$genre['genre']}</option>"; ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalAddLicensor" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/licensors/animes' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Licensor</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="licensorAnimeId">
        <div class="form-group px-2">
          <label for="licensor">Licensor</label>
          <select class="form-select" name="licensor" id="licensor" required>
            <option value="" selected hidden disabled>Select licensor</option>
            <?php foreach($data['licensors'] as $licensor)
            echo "<option value='{$licensor['id']}'>{$licensor['licensor']}</option>"; ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<!-- Function -->
<?php
function forEcho($animeId, $table, $key, $classModal, $idModal, $valueModal) {
  foreach($table as $info) {
    if($animeId === $info['anime_id']) {
      if($key === 'alias') {echo "<p class='m-0'><strong>{$info['origin_alias']}:</strong> {$info['anime_alias']}</p>";}
      else if($key === 'genre') {echo "{$info['genre']}, ";}
      else if($key === 'licensor') {echo "{$info['licensor']}, ";}
      unset($info);
    }
  } echo "<a role='button' class='btn btn-primary {$classModal}' data-bs-toggle='modal' data-bs-target='{$idModal}' id='{$animeId}'>{$valueModal}</a>";
} ?>

<?php require_once ADMIN_FOOT ?>