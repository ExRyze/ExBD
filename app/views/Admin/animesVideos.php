<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 col-11 overflow-hidden d-flex flex-column dropdown">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-secondary text-center mb-3">Table Animes Videos</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex mb-3 gap-3">
      <?= (isset($data['key']))? "<a href='".BASE_URL."/admin/animesvideos' class='btn btn-info'>Videos</a>" : "<a role='button' data-bs-toggle='modal' data-bs-target='#modalAddVideo' class='btn btn-success'>Add</a> <a href='".BASE_URL."/admin/animesvideos/history' class='btn btn-info'>History</a>" ?>
      <?= (file_exists(STORAGE_URL)) ? '' : "<div class='flasher flasher-warning m-0 text-center p-0'>Drive 'F:' doesn't exists</div>" ?>
    </div>
    <div class="mb-3 col-12 overflow-auto border border-3 border-dark">
      <table class="table table-anime m-0 table-bordered border-dark table-hover">
        <thead class="text-center">
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Type / Episodes</th>
            <th>Source / Format / Resolution</th>
            <th>Video Tracks</th>
            <th>Chapters</th>
            <th>Audios Tracks</th>
            <th>Subtitles</th>
            <th>Additional Errors</th>
            <th>Additional Values</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="m-0 bg-white">
          <?php
          foreach($data['animes'] as $key => $anime) { ?>
          <tr>
            <td class="text-center"><?= $key+1 ?></td>
            <td class="title-anime"><p class="fw-bold m-0"><?= $anime['title'] ?></p></td>
            <td class="text-center">
              <p class="fw-bold mb-3"><?= $anime['type'] ?></p>
              <p class="m-0"><?= ($anime['episodes'] === 1) ? $anime['episodes'].' episode' : $anime['episodes'].' episodes' ?></p>
            </td>
            <td class="text-center">
              <p class="fw-bold mb-3"><?= $anime['source_videos'] ?></p>
              <p class="m-0"><?= $anime['type_videos'] ?> - <?= $anime['resolution_videos'] ?></p>
            </td>
            <td><?= implode(',<br>', explode('; ', $anime['tracks_videos'])) ?></td>
            <td class="<?= ($anime['chapters_videos'] != 'NULL') ? (($anime['chapters_videos'] != 'FALSE') ? 'bg-success' : 'bg-warning') : 'bg-danger' ?> text-white">
              <?= $anime['chapters_videos'] ?></td>
            <td class="<?= (str_contains($anime['tracks_audios'], 'Jpn')) ? 'bg-success' : 'bg-warning' ?> text-white">
              <?= implode(',<br>', explode('; ', $anime['tracks_audios'])) ?></td>
            <td class="<?= ($anime['subtitles_videos'] != 'NULL') ? 'bg-success' : 'bg-danger' ?> text-white">
              <?= implode(',<br>', explode('; ', $anime['subtitles_videos'])) ?></td>
            <td class="<?= ($anime['additional_errors'] != '') ? 'bg-danger' : 'bg-success' ?> text-white">
              <?= implode(',<br>', explode('; ', $anime['additional_errors'])) ?></td>
            <td class="<?= ($anime['additional_values'] != '') ? 'text-dark' : 'bg-dark' ?> text-white">
              <?= implode(',<br>', explode('; ', $anime['additional_values'])) ?></td>
            <td>
              <div class="d-flex gap-3">
                <?= (isset($data['key'])) ? "
                <form action='".BASE_URL."/admin/revertAnimesVideos' method='post'>
                  <input type='hidden' name='id' value='{$anime['id']}'>
                  <button type='submit' class='btn btn-warning'>Revert</button>
                </form>" : '' ?>
                <a role="button" data-bs-toggle="modal" data-bs-target=<?= '#modalEditVideo'.$anime['id'] ?> class="btn btn-warning">Edit</a>
                <form action="<?= (isset($data['key']))? BASE_URL.'/admin/deleteAnimesVideos' : BASE_URL.'/admin/deleteAnimePart/Videos' ?>" method="post">
                  <input type="hidden" name="id" value="<?= $anime['id'] ?>">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a role='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target=<?= '#modalGenerateTitleFile'.$anime['id'] ?> id=<?= $anime['id'] ?>>Generate</a>
              </div>
            </td>
          </tr>
          <?php } ?>
        </tbody>
        <tfoot class="m-0 text-center">
          <th>No.</th>
          <th>Title</th>
          <th>Type / Episodes</th>
          <th>Source / Format / Resolution</th>
          <th>Video Tracks</th>
          <th>Chapters</th>
          <th>Audios Tracks</th>
          <th>Subtitles</th>
          <th>Additional Errors</th>
          <th>Additional Values</th>
          <th>Action</th>
        </tfoot>
      </table>
    </div>
  </main>
</div>

<!-- Add -->
<div class="modal fade" id="modalAddVideo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action=<?= BASE_URL.'/admin/addAnimePart/Videos' ?> method="post">
      <div class="modal-header">
        <h5>Add Videos</h5>
        <a class="btn-close" data-bs-dismiss="modal"></a>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="id">Anime</label>
          <select class="form-select" name="id" id="id" required>
            <option value="" selected hidden disabled>Select Anime</option>
            <?php foreach($data['anime_id'] as $anime)
            echo "<option value='{$anime['id']}'>{$anime['title']}</option>"; ?>
          </select>
        </div>
        <div class="form-group mb-3">
            <label for="source" class="form-label">Source videos</label>
            <input type="text" name="source" id="source" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="type" class="form-label">Type videos</label>
            <input type="text" name="type" id="type" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="resolution" class="form-label">Resolution videos</label>
            <input type="text" name="resolution" id="resolution" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="tracks" class="form-label">Video tracks</label>
            <input type="text" name="tracks" id="tracks" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="chapter" class="form-label">Chapters</label>
            <input type="text" name="chapter" id="chapter" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="audio" class="form-label">Audio tracks</label>
            <input type="text" name="audio" id="audio" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="subtitle" class="form-label">Subtitles</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="errors" class="form-label">Additional errors</label>
            <textarea name="errors" id="errors" class="col-12"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<!-- Edit -->
<?php foreach($data['animes'] as $anime) { ?>
  <div class="modal fade" id="modalGenerateTitleFile<?= $anime['id'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action=<?= BASE_URL.'/animes/update' ?> method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="m-0">Title</h5>
          <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="folder">Folder</label>
            <input class="form-control" type="text" value="<?= (str_contains($anime['title'], ':')) ? str_replace(':', '-', $anime['title']) : $anime['title'] ?>" readonly>
          </div>
          <div class="form-group mb-3">
            <label for="folder">File</label>
            <input class="form-control" type="text" value="<?= (str_contains($anime['title'], ':')) ? str_replace(':', '-', $anime['title']) : $anime['title'] ?><?= ($anime['type'] != 'Movie') ? (($anime['episodes'] === 1) ? ' – ' : ' Episode 0 – ') : ' – ' ?><?= $anime['source_videos'].' '.$anime['type'].' '.$anime['resolution_videos'].'.'.$anime['type_videos'] ?>" readonly>
          </div>
        </div>
      </form>
    </div>
  </div>
  
  <div class="modal fade" id=<?= 'modalEditVideo'.$anime['id'] ?> aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" action=<?= BASE_URL.'/admin/editAnimePart/Videos' ?> method="post">
        <div class="modal-header">
          <h5>Edit Videos</h5>
          <a class="btn-close" data-bs-dismiss="modal"></a>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="id">Anime</label>
            <select class="form-select" name="id" id="id" required>
              <option value=<?= $anime['id'] ?> selected><?= $anime['title'] ?></option>
            </select>
            <!-- <input type="hidden" name="id" id="id" value=<?= $anime['id'] ?>> -->
          </div>
          <div class="form-group mb-3">
              <label for="source" class="form-label">Source videos</label>
              <input type="text" name="source" id="source" class="form-control" required value="<?= $anime['source_videos'] ?>">
          </div>
          <div class="form-group mb-3">
              <label for="type" class="form-label">Type videos</label>
              <input type="text" name="type" id="type" class="form-control" required value="<?= $anime['type_videos'] ?>">
          </div>
          <div class="form-group mb-3">
              <label for="resolution" class="form-label">Resolution videos</label>
              <input type="text" name="resolution" id="resolution" class="form-control" required value="<?= $anime['resolution_videos'] ?>">
          </div>
          <div class="form-group mb-3">
              <label for="tracks" class="form-label">Video tracks</label>
              <input type="text" name="tracks" id="tracks" class="form-control" required value="<?= $anime['tracks_videos'] ?>">
          </div>
          <div class="form-group mb-3">
              <label for="chapter" class="form-label">Chapters</label>
              <input type="text" name="chapter" id="chapter" class="form-control" required value="<?= $anime['chapters_videos'] ?>">
          </div>
          <div class="form-group mb-3">
              <label for="audio" class="form-label">Audio tracks</label>
              <input type="text" name="audio" id="audio" class="form-control" required value="<?= $anime['tracks_audios'] ?>">
          </div>
          <div class="form-group mb-3">
              <label for="subtitle" class="form-label">Subtitles</label>
              <input type="text" name="subtitle" id="subtitle" class="form-control" required value="<?= $anime['subtitles_videos'] ?>">
          </div>
          <div class="form-group mb-3">
              <label for="errors" class="form-label">Video errors</label>
              <textarea name="errors" id="errors" class="col-12"><?= $anime['additional_errors'] ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
<?php } ?>

<?php require_once ADMIN_FOOT ?>