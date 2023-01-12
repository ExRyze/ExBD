<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 col-11 overflow-hidden d-flex flex-column dropdown">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-secondary text-center mb-3">Table Animes Videos</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex mb-3 gap-3">
      <?php if(!isset($data['key'])) { ?>
        <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' id="" anime="<?= str_replace('"', "`", json_encode($data['anime_id'])) ?>" key="add" url="Video">Add</a>
        <a href="<?= BASE_URL.'/admin/animesvideos/history' ?>" class='btn btn-info'>History</a>
      <?php } else if (isset($data['key'])) { ?>
        <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' id="DELETED" anime="<?= str_replace('"', "`", json_encode($data['anime_id'])) ?>" key="add" url="Video">Add</a>
        <a href="<?= BASE_URL.'/admin/animesvideos' ?>" class='btn btn-info'>Videos</a>
      <?php } ?>
      <?= (file_exists(STORAGE_URL)) ? '' : "<div class='flasher flasher-warning m-0 text-center p-0'>Drive 'F:' doesn't exists</div>" ?>
    </div>
    <div class="col-12 overflow-auto border border-3 border-dark">
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
            <td class="<?= (str_contains($anime['tracks_audios'], 'Jpn')) ? 'bg-success' : (($anime['tracks_audios'] != 'NULL') ? 'bg-warning' : 'bg-danger') ?> text-white">
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
                <?php if(!isset($data['key'])) { ?>
                  <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' id="" anime="<?= str_replace('"', "`", json_encode($anime)) ?>" key="edit" url="Video">Edit</a>
                <?php } else if (isset($data['key'])) { ?>
                  <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' id="DELETED" anime="<?= str_replace('"', "`", json_encode($anime)) ?>" key="edit" url="Video">Edit</a>
                <?php } ?>
                <form action="<?= (isset($data['key']))? BASE_URL.'/admin/deleteAnimesVideos' : BASE_URL.'/admin/deleteAnimePart/Videos' ?>" method="post">
                  <input type="hidden" name="id" value="<?= $anime['id'] ?>">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a role='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#modal' anime="<?= str_replace('"', "`", json_encode($anime)) ?>" key="generate" url="Video">Generate</a>
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

<div class="modal fade" id="modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="m-0"></h5>
        <a class="btn-close" data-bs-dismiss='modal' role="button"></a>
      </div>
      <div class="modal-body">
      </div>
    </form>
  </div>
</div>

<?php require_once ADMIN_FOOT ?>