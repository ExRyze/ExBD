<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 col-11 d-flex flex-column">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-secondary text-center mb-3">Table Animes</h2>
    <?php Flasher::flasher() ?>
    <div class="col-12 d-flex mb-3 gap-3">
      <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' uid="<?= $_SESSION['user']['id'] ?>"  key="add" url="Anime">Add</a>
    </div>
    <div class="col-12 overflow-auto border border-3 border-dark">
      <table class="table table-anime m-0 table-bordered border-dark table-hover">
        <thead class="text-center">
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Type / Episodes</th>
            <th>Status / Aired - Finished</th>
            <th>Genres / Themes</th>
            <th>Producers / Licensors / Studios</th>
            <th>Relations</th>
            <th>Created at / Updated at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="m-0 bg-white">
        <?php 
        foreach($data['animes'] as $key => $anime) { ?>
          <tr>
            <td class="text-center"><?= $key+1 ?></td>
            <td class="title-anime"><p class="fw-bold m-0 pb-2 border-3 border-bottom border-dark"><?= $anime['title'] ?></p>
              <?php foreach($anime['aliases'] as $alias) {echo "<p class='m-0'><strong>{$alias['origin_alias']}:</strong> {$alias['anime_alias']}</p>";} ?>
              <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" key="add" url="Alias">Add</a>
              <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" anime="<?= str_replace('"', "`", json_encode($anime['aliases'])) ?>" key="edit" url="Alias">Edit</a>
            </td>
            <td class="text-center">
              <p class="fw-bold mb-3"><?= $anime['type'] ?></p>
              <p class="m-0"><?= ($anime['episodes'] === 1) ? $anime['episodes'].' episode' : $anime['episodes'].' episodes' ?></p>
            </td>
            <td>
              <p class="fw-bold text-center"><?= $anime['status'] ?></p>
              <p class="text-center m-0"><?= ($anime['aired']) ? date('d M Y', strtotime($anime['aired'])) : '' ?></p>
              <p class="text-center m-0"><?= ($anime['finished']) ? "<small class='text-center'>to</small><br>".date('d M Y', strtotime($anime['finished'])) : '' ?></p>
            </td>
            <td class="genre-theme-anime">
              <div class="pb-2 border-3 border-bottom border-dark mb-2">
                <?= ($anime['genres']) ? "<p class='mb-0'><strong>Genres :</strong> ".implode(', ', $anime['genres'])."</p>" : ''; ?>
                <a role='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" key="new" url="Genre">New</a>
                <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($data['genres'])) ?>" key="add" url="Genre">Add</a>
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($anime['genres'])) ?>" key="edit" url="Genre">Edit</a>
              </div>
              <div>
                <?= ($anime['themes']) ? "<p class='mb-0'><strong>Themes :</strong> ".implode(', ', $anime['themes'])."</p>" : ''; ?>
                <a role='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" key="new" url="Theme">New</a>
                <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($data['themes'])) ?>" key="add" url="Theme">Add</a>
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($anime['themes'])) ?>" key="edit" url="Theme">Edit</a>
              </div>
            </td>
            <td class="producer-licensor-studio-anime">
              <div class="pb-2 border-3 border-bottom border-dark mb-2">
                <?= ($anime['producers']) ? "<p class='mb-0'><strong>Producers :</strong> ".implode(', ', $anime['producers'])."</p>" : ''; ?>
                <a role='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" key="new" url="Producer">New</a>
                <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($data['producers'])) ?>" key="add" url="Producer">Add</a>
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($anime['producers'])) ?>" key="edit" url="Producer">Edit</a>
              </div>
              <div class="pb-2 border-3 border-bottom border-dark mb-2">
                <?= ($anime['licensors']) ? "<p class='mb-0'><strong>Licensors :</strong> ".implode(', ', $anime['licensors'])."</p>" : ''; ?>
                <a role='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" key="new" url="Licensor">New</a>
                <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($data['licensors'])) ?>" key="add" url="Licensor">Add</a>
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($anime['licensors'])) ?>" key="edit" url="Licensor">Edit</a>
              </div>
              <div>
                <?= ($anime['studios']) ? "<p class='mb-0'><strong>Studios :</strong> ".implode(', ', $anime['studios'])."</p>" : ''; ?>
                <a role='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" key="new" url="Studio">New</a>
                <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($data['studios'])) ?>" key="add" url="Studio">Add</a>
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($anime['studios'])) ?>" key="edit" url="Studio">Edit</a>
              </div>
            </td>
            <td><?php foreach($anime['relations'] as $key => $relation) { ?>
              <div class="d-flex gap-1">
                <strong><?= $key ?> :</strong>
                <a href="<?= BASE_URL.'/animes/anime/'.$relation['slug'] ?>"><?= $relation['title'] ?></a>,<br>
              </div>
              <?php } ?>
              <a role='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($data['anime_id'])) ?>" key="add" url="Relation">Add</a>
              <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' id="<?= $anime['id'] ?>" title="<?= $anime['title'] ?>" anime="<?= str_replace('"', "`", json_encode($anime['relations'])) ?>" key="edit" url="Relation">Edit</a>
            </td>
            <td class="text-center">
              <?= date('d M Y H:i:s A', strtotime($anime['created_at'])) ?> <br><br> <small>Updated :</small> <br> <?= date('d M Y H:i:s A', strtotime($anime['updated_at'])) ?> <br><br> <strong>By :</strong> <?= $anime['username'] ?>
            </td>
            <td>
              <div class="d-flex gap-3">
                <a role='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal' uid="<?= $_SESSION['user']['id'] ?>" anime="<?= str_replace('"', "`", json_encode($anime)) ?>" key="edit" url="Anime">Edit</a>
                <a href="<?= BASE_URL.'/animes/delete/'.$anime['id'] ?>" class="btn btn-danger">Delete</a>
              </div>
            </td>
          </tr>
        <?php } ?>
        </tbody>
        <tfoot class="m-0 text-center">
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Type / Episodes</th>
            <th>Status / Aired - Finished</th>
            <th>Genres / Themes</th>
            <th>Producers / Licensors / Studios</th>
            <th>Created at / Updated at</th>
            <th>Action</th>
          </tr>
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