<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 col-11 overflow-hidden d-flex flex-column dropdown">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark text-center mb-3">Table Animes Videos</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex mb-3">
      <a role="button" data-bs-toggle="modal" data-bs-target="#modalAddVideo" class="btn btn-success">Add</a>
    </div>
    <div class="mb-3 col-12 overflow-auto border border-3 border-dark">
      <table class="table m-0 table-bordered border-dark table-hover">
        <thead class="bg-secondary text-center">
          <tr>
            <th>No.</th>
            <th>Title</th>
            <Th>Episodes</Th>
            <th>Type</th>
            <th>Source Video</th>
            <th>Type Video</th>
            <th>Resolution</th>
            <th>Video Tracks</th>
            <th>Chapters</th>
            <th>Audios Tracks</th>
            <th>Subtitles</th>
            <th>Additional</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="m-0">
          <?php $index = 1;
          foreach($data['animes'] as $anime) { ?>
          <tr>
            <td><?= $index ?></td>
            <td><?= $anime['title'] ?></td>
            <td><?= $anime['episodes'] ?></td>
            <td><?= $anime['type'] ?></td>
            <td><?= $anime['source_videos'] ?></td>
            <td><?= $anime['type_videos'] ?></td>
            <td><?= $anime['resolution_videos'] ?></td>
            <td><?= $anime['tracks_videos'] ?></td>
            <td class="<?= ($anime['chapters_videos'] != 'NULL') ? (($anime['chapters_videos'] != 'FALSE') ? 'bg-success' : 'bg-warning') : 'bg-danger' ?> text-white">
              <?= $anime['chapters_videos'] ?></td>
            <td class="<?= (str_contains($anime['tracks_audios'], 'Jpn')) ? 'bg-success' : 'bg-warning' ?> text-white">
              <?= $anime['tracks_audios'] ?></td>
            <td class="<?= ($anime['subtitles_videos'] != 'NULL') ? 'bg-success' : 'bg-danger' ?> text-white">
              <?= $anime['subtitles_videos'] ?></td>
            <td class="<?= ($anime['additional_errors'] != '') ? 'bg-danger' : 'bg-success' ?> text-white">
              <?= $anime['additional_errors'] ?></td>
            <td>
              <div class="d-flex gap-3">
                <a role="button" data-bs-toggle="modal" data-bs-target=<?= '#modalEditVideo'.$anime['id'] ?> class="btn btn-warning">Edit</a>
                <form action="<?= BASE_URL.'/admin/deleteAnimePart/Videos' ?>" method="post">
                  <input type="hidden" name="id" value="<?= $anime['id'] ?>">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </td>
          </tr>
          <?php $index += 1; } ?>
        </tbody>
        <tfoot class="bg-secondary m-0 text-center">
          <th>No.</th>
          <th>Title</th>
          <Th>Episodes</Th>
          <th>Type</th>
          <th>Source Video</th>
          <th>Type Video</th>
          <th>Resolution</th>
          <th>Video Tracks</th>
          <th>Chapters</th>
          <th>Audios Tracks</th>
          <th>Subtitles</th>
          <th>Additional</th>
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