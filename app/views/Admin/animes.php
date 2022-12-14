<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 col-11 d-flex flex-column">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-secondary text-center mb-3">Table Animes</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex mb-3">
      <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modalAddAnime'>Add</a>
    </div>
    <div class="col-12 overflow-auto border border-3 border-dark">
      <table class="table table-anime m-0 table-bordered border-dark table-hover">
        <thead class="text-center">
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Episodes</th>
            <th>Type</th>
            <th>Status / Aired - Finished</th>
            <th>Genres / Themes</th>
            <th>Producers / Licensors / Studios</th>
            <th>Created at / Updated at</th>
            <th>Id user</th>
            <th>Exists</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="m-0 bg-white">
        <?php $index = 1;
        foreach($data['animes'] as $anime) { ?>
          <tr>
            <td class="text-center"><?= $index ?></td>
            <td class="title-anime"><p class="fw-bold m-0 pb-2 border-3 border-bottom border-dark"><?= $anime['title'] ?></p>
              <?php foreach($anime['aliases'] as $alias) {echo "<p class='m-0'><strong>{$alias['origin_alias']}:</strong> {$alias['anime_alias']}</p>";} ?>
              <a role='button' class='btn btn-success btn-add-alias' data-bs-toggle='modal' data-bs-target='#modalAddAlias' id=<?= $anime['id'] ?>>Add</a>
              <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target=<?= '#modalEditAlias'.$anime['id'] ?> id=<?= $anime['id'] ?>>Edit</a>
            </td>
            <td><?= $anime['episodes'].' episodes' ?></td>
            <td class="text-center fw-bold"><?= $anime['type'] ?></td>
            <td><p class="fw-bold text-center"><?= $anime['status'] ?></p>
            <p class="text-center m-0"><?= ($anime['aired']) ? date('d M Y', strtotime($anime['aired'])) : '' ?></p>
            <p class="text-center m-0"><?= ($anime['finished']) ? "<small class='text-center'>to</small><br>".date('d M Y', strtotime($anime['finished'])) : '' ?></p></td>
            <td class="genre-theme-anime">
              <div class="pb-2 border-3 border-bottom border-dark mb-2">
                <?= ($anime['genres']) ? "<p class='mb-0'><strong>Genres :</strong> ".implode(', ', $anime['genres'])."</p>" : ''; ?>
                <a role='button' class='btn btn-success btn-add-genre' data-bs-toggle='modal' data-bs-target='#modalAddGenre' id=<?= $anime['id'] ?>>Add</a>
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target=<?= '#modalEditGenre'.$anime['id'] ?> id=<?= $anime['id'] ?>>Edit</a>
              </div>
              <div>
                <?= ($anime['themes']) ? "<p class='mb-0'><strong>Themes :</strong> ".implode(', ', $anime['themes'])."</p>" : ''; ?>
                <a role='button' class='btn btn-success btn-add-theme' data-bs-toggle='modal' data-bs-target='#modalAddTheme' id=<?= $anime['id'] ?>>Add</a>
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target=<?= '#modalEditTheme'.$anime['id'] ?> id=<?= $anime['id'] ?>>Edit</a>
              </div>
            </td>
            <td class="producer-licensor-studio-anime">
              <div class="pb-2 border-3 border-bottom border-dark mb-2">
                <?= ($anime['producers']) ? "<p class='mb-0'><strong>Producers :</strong> ".implode(', ', $anime['producers'])."</p>" : ''; ?>
                <a role='button' class='btn btn-success btn-add-producer' data-bs-toggle='modal' data-bs-target='#modalAddProducer' id=<?= $anime['id'] ?>>Add</a>
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target=<?= '#modalEditProducer'.$anime['id'] ?> id=<?= $anime['id'] ?>>Edit</a>
              </div>
              <div class="pb-2 border-3 border-bottom border-dark mb-2">
                <?= ($anime['licensors']) ? "<p class='mb-0'><strong>Licensors :</strong> ".implode(', ', $anime['licensors'])."</p>" : ''; ?>
                <a role='button' class='btn btn-success btn-add-licensor' data-bs-toggle='modal' data-bs-target='#modalAddLicensor' id=<?= $anime['id'] ?>>Add</a>
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target=<?= '#modalEditLicensor'.$anime['id'] ?> id=<?= $anime['id'] ?>>Edit</a>
              </div>
              <div>
                <?= ($anime['studios']) ? "<p class='mb-0'><strong>Studios :</strong> ".implode(', ', $anime['studios'])."</p>" : ''; ?>
                <a role='button' class='btn btn-success btn-add-studio' data-bs-toggle='modal' data-bs-target='#modalAddStudio' id=<?= $anime['id'] ?>>Add</a>
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target=<?= '#modalEditStudio'.$anime['id'] ?> id=<?= $anime['id'] ?>>Edit</a>
              </div>
            </td>
            <td class="text-center"><?= date('d M Y H:i:s A', strtotime($anime['created_at'])) ?> <br><br> <small>Updated :</small> <br> <?= date('d M Y H:i:s A', strtotime($anime['updated_at'])) ?></td>
            <td class="text-center"><?= $anime['id_user'] ?></td>
            <td><?= (file_exists(STORAGE_URL)) ? ((file_exists(STORAGE_ANIMES.'/'.$anime['title'])) ? 'Exists' : 'Not exists') : "Drive 'F:' doesn't exists" ?></td>
            <td>
              <div class="d-flex gap-3">
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modalEditAnime<?= $anime['id'] ?>'>Edit</a>
                <a href="<?= BASE_URL.'/animes/delete/'.$anime['id'] ?>" class="btn btn-danger">Delete</a>
              </div>
            </td>
          </tr>
        <?php $index += 1; } ?>
        </tbody>
        <tfoot class="m-0 text-center">
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Episodes</th>
            <th>Type</th>
            <th>Status / Aired - Finished</th>
            <th>Genres / Themes</th>
            <th>Producers / Licensors / Studios</th>
            <th>Created at / Updated at</th>
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
<div class="modal fade modal-add" id="modalAddAnime" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/animes/store' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Anime</h5>
        <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id'] ?>">
        <div class="form-group mb-3">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Title..." required>
        </div>
        <div class="form-group mb-3">
          <label for="episodes">Episodes</label>
          <input type="number" class="form-control" name="episodes" id="episodes" min="0" value="0">
        </div>
        <div class="form-group mb-3">
          <label for="status">Status</label>
          <select class="form-select" name="status" id="status" required>
            <option value="" selected disabled hidden>Status</option>
            <option value="Not yet aired">Not yet aired</option>
            <option value="Currently aired">Currently aired</option>
            <option value="Finished airing">Finished airing</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="tipe">Type</label>
          <select class="form-select" name="tipe" id="tipe" required>
            <option value="" selected disabled hidden>Type</option>
            <option value="TV">TV</option>
            <option value="BD">BD</option>
            <option value="OVA">OVA</option>
            <option value="ONA">ONA</option>
            <option value="OAD">OAD</option>
            <option value="Movie">Movie</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="aired">Date Aired</label>
          <input class="form-control" type="date" name="aired" id="aired">
        </div>
        <div class="form-group">
          <label for="finished">Date Finished</label>
          <input class="form-control" type="date" name="finished" id="finished">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade modal-add" id="modalAddAlias" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/admin/addAnimePart/aliases' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Alias</h5>
        <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
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

<div class="modal fade modal-add" id="modalAddGenre" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/admin/addAnimePart/genres' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Genre</h5>
        <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="addGenreAnimeId">
        <div class="form-group mb-2">
          <label for="genre">Genre</label>
          <select class="form-select" name="genre" id="genre" required>
            <option value="" selected hidden disabled>Select genre</option>
            <?php foreach($data['genres'] as $genre)
            echo "<option value='{$genre['id']}'>{$genre['genre']}</option>"; ?>
          </select>
        </div>
        <small><a class="link-primary" role='button' data-bs-toggle='modal' data-bs-target='#modalNewGenre'>New Genre</a></small>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
<div class="modal fade modal-add" id='modalNewGenre' aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action=<?= BASE_URL.'/admin/addParts/genres' ?> method="post">
      <div class="modal-header">
        <h5>New Genre</h5>
        <a class="btn-close" data-bs-dismiss="modal"></a>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label" for='genre'>Genre</label>
          <input type="text" name='genre' id='genre' class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade modal-add" id="modalAddTheme" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/admin/addAnimePart/themes' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Theme</h5>
        <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="addThemeAnimeId">
        <div class="form-group mb-2">
          <label for="theme">Theme</label>
          <select class="form-select" name="theme" id="theme" required>
            <option value="" selected hidden disabled>Select theme</option>
            <?php foreach($data['themes'] as $theme)
            echo "<option value='{$theme['id']}'>{$theme['theme']}</option>"; ?>
          </select>
        </div>
        <small><a class="link-primary" role='button' data-bs-toggle='modal' data-bs-target='#modalNewTheme'>New Theme</a></small>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
<div class="modal fade modal-add" id='modalNewTheme' aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action=<?= BASE_URL.'/admin/addParts/themes' ?> method="post">
      <div class="modal-header">
        <h5>New Theme</h5>
        <a class="btn-close" data-bs-dismiss="modal"></a>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label" for='theme'>Theme</label>
          <input type="text" name='theme' id='theme' class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade modal-add" id="modalAddProducer" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/admin/addAnimePart/producers' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Producer</h5>
        <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="addProducerAnimeId">
        <div class="form-group mb-2">
          <label for="producer">Producer</label>
          <select class="form-select" name="producer" id="producer" required>
            <option value="" selected hidden disabled>Select producer</option>
            <?php foreach($data['producers'] as $producer)
            echo "<option value='{$producer['id']}'>{$producer['producer']}</option>"; ?>
          </select>
        </div>
        <small><a class="link-primary" role='button' data-bs-toggle='modal' data-bs-target='#modalNewProducer'>New Producer</a></small>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
<div class="modal fade modal-add" id='modalNewProducer' aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action=<?= BASE_URL.'/admin/addParts/producers' ?> method="post">
      <div class="modal-header">
        <h5>New Producer</h5>
        <a class="btn-close" data-bs-dismiss="modal"></a>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label" for='producer'>Producer</label>
          <input type="text" name='producer' id='producer' class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade modal-add" id="modalAddLicensor" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/admin/addAnimePart/licensors' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Licensor</h5>
        <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="addLicensorAnimeId">
        <div class="form-group mb-2">
          <label for="licensor">Licensor</label>
          <select class="form-select" name="licensor" id="licensor" required>
            <option value="" selected hidden disabled>Select licensor</option>
            <?php foreach($data['licensors'] as $licensor)
            echo "<option value='{$licensor['id']}'>{$licensor['licensor']}</option>"; ?>
          </select>
        </div>
        <small><a class="link-primary" role='button' data-bs-toggle='modal' data-bs-target='#modalNewLicensor'>New Licensor</a></small>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
<div class="modal fade modal-add" id='modalNewLicensor' aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action=<?= BASE_URL.'/admin/addParts/licensors' ?> method="post">
      <div class="modal-header">
        <h5>New Licensor</h5>
        <a class="btn-close" data-bs-dismiss="modal"></a>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label" for='licensor'>Licensor</label>
          <input type="text" name='licensor' id='licensor' class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade modal-add" id="modalAddStudio" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action=<?= BASE_URL.'/admin/addAnimePart/studios' ?> method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0">Add Studio</h5>
        <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="addStudioAnimeId">
        <div class="form-group mb-2">
          <label for="studio">Studio</label>
          <select class="form-select" name="studio" id="studio" required>
            <option value="" selected hidden disabled>Select studio</option>
            <?php foreach($data['studios'] as $studio)
            echo "<option value='{$studio['id']}'>{$studio['studio']}</option>"; ?>
          </select>
        </div>
        <small><a class="link-primary" role='button' data-bs-toggle='modal' data-bs-target='#modalNewStudio'>New Studio</a></small>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
<div class="modal fade modal-add" id='modalNewStudio' aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action=<?= BASE_URL.'/admin/addParts/studios' ?> method="post">
      <div class="modal-header">
        <h5>New Studio</h5>
        <a class="btn-close" data-bs-dismiss="modal"></a>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label" for='studio'>Studio</label>
          <input type="text" name='studio' id='studio' class="form-control" autofocus>
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
  <div class="modal fade" id="modalEditAnime<?= $anime['id'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action=<?= BASE_URL.'/animes/update' ?> method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="m-0">Edit Anime</h5>
          <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id'] ?>">
          <input type="hidden" name="id" value="<?= $anime['id'] ?>">
          <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title..." value="<?= $anime['title'] ?>" required>
          </div>
          <div class="form-group mb-3">
            <label for="episodes">Episodes</label>
            <input type="number" class="form-control" name="episodes" id="episodes" min="0" value="<?= $anime['episodes'] ?>">
          </div>
          <div class="form-group mb-3">
            <label for="status">Status</label>
            <select class="form-select" name="status" id="status" required>
              <option value="Not yet aired" <?= ($anime['status'] === 'Not yet aired') ? 'selected' : '' ?>>Not yet aired</option>
              <option value="Currently aired" <?= ($anime['status'] === 'Currently aired') ? 'selected' : '' ?>>Currently aired</option>
              <option value="Finished airing" <?= ($anime['status'] === 'Finished airing') ? 'selected' : '' ?>>Finished airing</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="tipe">Type</label>
            <select class="form-select" name="tipe" id="tipe" required>
              <option value="TV" <?= ($anime['type'] === 'TV') ? 'selected' : '' ?>>TV</option>
              <option value="BD" <?= ($anime['type'] === 'BD') ? 'selected' : '' ?>>BD</option>
              <option value="OVA" <?= ($anime['type'] === 'OVA') ? 'selected' : '' ?>>OVA</option>
              <option value="ONA" <?= ($anime['type'] === 'ONA') ? 'selected' : '' ?>>ONA</option>
              <option value="OAD" <?= ($anime['type'] === 'OAD') ? 'selected' : '' ?>>OAD</option>
              <option value="Movie" <?= ($anime['type'] === 'Movie') ? 'selected' : '' ?>>Movie</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="aired">Date Aired</label>
            <input class="form-control" type="date" name="aired" id="aired" value="<?= $anime['aired'] ?>">
          </div>
          <div class="form-group">
            <label for="finished">Date Finished</label>
            <input class="form-control" type="date" name="finished" id="finished" value="<?= $anime['finished'] ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id=<?= 'modalEditAlias'.$anime['id'] ?> aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="m-0">Edit Alias</h5>
          <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
        </div>
        <div class="modal-body">
          <?php foreach($anime['aliases'] as $alias) { ?>
            <form action=<?= BASE_URL.'/admin/deleteAnimePart/aliases' ?> method="post" class="mb-3">
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

  <div class="modal fade" id=<?= 'modalEditGenre'.$anime['id'] ?> aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="m-0">Edit Genre</h5>
          <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
        </div>
        <div class="modal-body">
          <?php foreach($anime['genres'] as $genre) { ?>
            <form action=<?= BASE_URL.'/admin/deleteAnimePart/genres' ?> method="post" class="mb-3">
              <input type="hidden" name="id" value=<?= $anime['id'] ?>>
              <div class="d-flex gap-3 align-items-center">
                <input type="text" name="genre" class="form-control" value='<?= $genre ?>' readonly>
                <button type="submit" class="btn-close"></button>
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id=<?= 'modalEditTheme'.$anime['id'] ?> aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="m-0">Edit Theme</h5>
          <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
        </div>
        <div class="modal-body">
          <?php foreach($anime['themes'] as $theme) { ?>
            <form action=<?= BASE_URL.'/admin/deleteAnimePart/themes' ?> method="post" class="mb-3">
              <input type="hidden" name="id" value=<?= $anime['id'] ?>>
              <div class="d-flex gap-3 align-items-center">
                <input type="text" name="theme" class="form-control" value='<?= $theme ?>' readonly>
                <button type="submit" class="btn-close"></button>
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id=<?= 'modalEditProducer'.$anime['id'] ?> aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="m-0">Edit Producer</h5>
          <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
        </div>
        <div class="modal-body">
          <?php foreach($anime['producers'] as $producer) { ?>
            <form action=<?= BASE_URL.'/admin/deleteAnimePart/producers' ?> method="post" class="mb-3">
              <input type="hidden" name="id" value=<?= $anime['id'] ?>>
              <div class="d-flex gap-3 align-items-center">
                <input type="text" name="producer" class="form-control" value='<?= $producer ?>' readonly>
                <button type="submit" class="btn-close"></button>
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id=<?= 'modalEditLicensor'.$anime['id'] ?> aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="m-0">Edit Licensor</h5>
          <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
        </div>
        <div class="modal-body">
          <?php foreach($anime['licensors'] as $licensor) { ?>
            <form action=<?= BASE_URL.'/admin/deleteAnimePart/licensors' ?> method="post" class="mb-3">
              <input type="hidden" name="id" value=<?= $anime['id'] ?>>
              <div class="d-flex gap-3 align-items-center">
                <input type="text" name="licensor" class="form-control" value='<?= $licensor ?>' readonly>
                <button type="submit" class="btn-close"></button>
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id=<?= 'modalEditStudio'.$anime['id'] ?> aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="m-0">Edit Studio</h5>
          <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
        </div>
        <div class="modal-body">
          <?php foreach($anime['studios'] as $studio) { ?>
            <form action=<?= BASE_URL.'/admin/deleteAnimePart/studios' ?> method="post" class="mb-3">
              <input type="hidden" name="id" value=<?= $anime['id'] ?>>
              <div class="d-flex gap-3 align-items-center">
                <input type="text" name="studio" class="form-control" value='<?= $studio ?>' readonly>
                <button type="submit" class="btn-close"></button>
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php require_once ADMIN_FOOT ?>