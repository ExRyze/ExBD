<?php require_once ADMIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<div class="col-12 d-flex ">
  <?php require_once ADMIN_SIDENAV ?>
  <main class="p-3 col-11 d-flex flex-column">
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark text-center mb-3">Add Anime</h2>
    <?php Flasher::flasher() ?>
    <div class="card col-12">
      <form action="<?= BASE_URL.'/animes/update' ?>" method="post" class="card-body d-flex gap-3 flex-column">
        <input type="hidden" name="id" value="<?= $data['anime']['id'] ?>">
        <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id'] ?>">
        <div class="d-flex col-12">
          <div class="form-group col-5 pe-2">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="<?= $data['anime']['title'] ?>" id="title" name="title" placeholder="Title..."  required>
          </div>
          <!-- <div class="form-group col-5 px-2">
            <label for="alternativeTitle">Alternative Title</label>
            <input type="text" class="form-control" id="alternativeTitle" name="alternativeTitle" placeholder="AAA, BBB, CCC, ...">
          </div> -->
          <div class="form-group col-2 ps-2">
            <label for="episodes">Episodes</label>
            <input type="number" class="form-control" value="<?= $data['anime']['episodes'] ?>" name="episodes" id="episodes" min="0" value="0">
          </div>
        </div>
        <div class="d-flex col-12">
          <!-- <div class="form-group col-2 pe-2">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
              <option value="" selected disabled hidden>Status</option>
              <option value="Not yet aired">Not yet aired</option>
              <option value="Currently aired">Currently aired</option>
              <option value="Finished airing">Finished airing</option>
            </select>
          </div> -->
          <div class="form-group col-2 px-2">
            <label for="tipe">Type</label>
            <select class="form-select" name="tipe" id="tipe">
              <option value="TV" <?= ($data['anime']['type'] === 'TV') ? 'selected' : '' ?>>TV</option>
              <option value="BD" <?= ($data['anime']['type'] === 'BD') ? 'selected' : '' ?>>BD</option>
            </select>
          </div>
        </div>
        <div class="d-flex col-12">
          <div class="form-group col-5 pe-2">
            <label for="aired">Date Aired</label>
            <input class="form-control" type="datetime-local" name="aired" id="aired" value="<?= $data['anime']['aired'] ?>">
          </div>
          <div class="form-group col-5 ps-2">
            <label for="finished">Date Finished</label>
            <input class="form-control" type="datetime-local" name="finished" id="finished" value="<?= $data['anime']['finished'] ?>">
          </div>
        </div>
        <div class="d-flex col-12 justify-content-end">
          <input type="submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </main>
</div>

<?php require_once MAIN_FOOT ?>