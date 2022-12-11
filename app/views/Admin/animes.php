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
            <th>Producers</th>
            <th>Licensors</th>
            <th>Studios</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Id user</th>
            <th>Exists</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="m-0">
        <?php $index = 1;
        foreach($data['animes'] as $anime) { ?>
          <tr>
            <td><?= $index ?></td>
            <td><?= $anime['title'] ?></td>
            <td>
              <?php foreach($anime['aliases'] as $alias) {echo "<p class='m-0'><strong>{$alias['origin_alias']}:</strong> {$alias['anime_alias']}</p>";} ?>
              <a role='button' class='btn btn-primary btn-add-alias' data-bs-toggle='modal' data-bs-target='#modalAddAlias' id=<?= $anime['id'] ?>>Add</a>
              <a role='button' class='btn btn-primary btn-edit-alias' data-bs-toggle='modal' data-bs-target=<?= '#modalEditAlias'.$anime['id'] ?> id=<?= $anime['id'] ?>>Edit</a>
            </td>
            <td><?= $anime['episodes'].' episodes' ?></td>
            <td><?= $anime['type'] ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($anime['aired'])) ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($anime['finished'])) ?></td>
            <td>
              <?php echo implode(', ', $anime['genres']); ?> <br>
              <a role='button' class='btn btn-primary btn-add-genre' data-bs-toggle='modal' data-bs-target='#modalAddGenre' id=<?= $anime['id'] ?>>Add genre</a> </td>
            <td>
              <?php echo implode(', ', $anime['producers']); ?> <br>
              <a role='button' class='btn btn-primary btn-add-producer' data-bs-toggle='modal' data-bs-target='#modalAddProducer' id=<?= $anime['id'] ?>>Add producer</a> </td>
            <td>
              <?php echo implode(', ', $anime['licensors']); ?> <br>
              <a role='button' class='btn btn-primary btn-add-licensor' data-bs-toggle='modal' data-bs-target='#modalAddLicensor' id=<?= $anime['id'] ?>>Add licensor</a> </td>
            <td>
              <?php echo implode(', ', $anime['studios']); ?> <br>
              <a role='button' class='btn btn-primary btn-add-studio' data-bs-toggle='modal' data-bs-target='#modalAddStudio' id=<?= $anime['id'] ?>>Add studio</a> </td>
            <td><?= date('d M Y H:i:s A', strtotime($anime['created_at'])) ?></td>
            <td><?= date('d M Y H:i:s A', strtotime($anime['updated_at'])) ?></td>
            <td><?= $anime['id_user'] ?></td>
            <td><?= (file_exists(STORAGE_URL)) ? ((file_exists(STORAGE_ANIMES.'/'.$anime['title'])) ? 'Exists' : 'Not exists') : "Drive 'F:' doesn't exists" ?></td>
            <td>
              <div class="d-flex gap-3">
                <a href="<?= BASE_URL.'/animes/edit/'.$anime['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="<?= BASE_URL.'/animes/delete/'.$anime['id'] ?>" class="btn btn-danger">Delete</a>
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
            <th>Producers</th>
            <th>Licensors</th>
            <th>Studios</th>
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

<!-- Modal Add -->
<div class="modal fade" id="modalAddAlias" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/aliases/animesAdd' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Alias</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="addAliasAnimeId">
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
    <form action=<?= BASE_URL.'/genres/animesAdd' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Genre</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="addGenreAnimeId">
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

<div class="modal fade" id="modalAddProducer" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/producers/animesAdd' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Producer</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="addProducerAnimeId">
        <div class="form-group px-2">
          <label for="producer">Producer</label>
          <select class="form-select" name="producer" id="producer" required>
            <option value="" selected hidden disabled>Select producer</option>
            <?php foreach($data['producers'] as $producer)
            echo "<option value='{$producer['id']}'>{$producer['producer']}</option>"; ?>
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
    <form action=<?= BASE_URL.'/licensors/animesAdd' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Licensor</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="addLicensorAnimeId">
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

<div class="modal fade" id="modalAddStudio" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/studios/animesAdd' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Studio</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="addStudioAnimeId">
        <div class="form-group px-2">
          <label for="studio">Studio</label>
          <select class="form-select" name="studio" id="studio" required>
            <option value="" selected hidden disabled>Select studio</option>
            <?php foreach($data['studios'] as $studio)
            echo "<option value='{$studio['id']}'>{$studio['studio']}</option>"; ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit -->
<?php foreach($data['animes'] as $anime) { ?>
  <div class="modal fade" id=<?= 'modalEditAlias'.$anime['id'] ?> aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="m-0">Edit Alias</h5>
          <a class="btn-close" data-bs-dismiss='modal'></a>
        </div>
        <div class="modal-body">
          <?php foreach($anime['aliases'] as $alias) { ?>
            <form action=<?= BASE_URL.'/aliases/animesEdit' ?> method="post" class="mb-3">
              <input type="hidden" name="id" value=<?= $anime['id'] ?>>
              <label class="form-label" for="alias"><?= $alias['origin_alias'] ?></label>
              <input type="hidden" name="origin" value='<?= $alias['origin_alias'] ?>'>
              <div class="d-flex gap-3 align-items-center">
                <input type="text" name="alias" id="alias" class="form-control" value='<?= $alias['anime_alias'] ?>' readonly>
                <button type="submit" class="btn-close"></button>
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Modal Edit -->
<div class="modal fade" id="modalEditAlias" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/aliases/animesEdit' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Edit Alias</h5>
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

<div class="modal fade" id="modalEditGenre" aria-hidden="true">
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

<div class="modal fade" id="modalEditProducer" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/producers/animes' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Producer</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="producerAnimeId">
        <div class="form-group px-2">
          <label for="producer">Producer</label>
          <select class="form-select" name="producer" id="producer" required>
            <option value="" selected hidden disabled>Select producer</option>
            <?php foreach($data['producers'] as $producer)
            echo "<option value='{$producer['id']}'>{$producer['producer']}</option>"; ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalEditLicensor" aria-hidden="true">
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

<div class="modal fade" id="modalEditStudio" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/studios/animes' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Studio</h5>
        <a class="btn-close" data-bs-dismiss='modal'></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="studioAnimeId">
        <div class="form-group px-2">
          <label for="studio">Studio</label>
          <select class="form-select" name="studio" id="studio" required>
            <option value="" selected hidden disabled>Select studio</option>
            <?php foreach($data['studios'] as $studio)
            echo "<option value='{$studio['id']}'>{$studio['studio']}</option>"; ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<?php require_once ADMIN_FOOT ?>