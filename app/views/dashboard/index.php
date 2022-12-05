<?php require_once MAIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<main class="p-3 d-flex flex-column align-items-center col-10 mx-auto">
  <?php Flasher::flasher() ?>
  <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark mb-3">Animes</h2>
  <div class="d-flex flex-wrap col-12 gap-3">
    <?php foreach($data['animes'] as $anime) { ?>
      <a href="<?= BASE_URL ?>" class="border border-1 border-dark anime-card text-decoration-none text-dark">
        <div class="p-2">
          <h5 class="mb-1"><?= $anime['title'] ?></h5>
          <p class="m-0"><?= $anime['episodes'] ?> Episodes</p>
        </div>
      </a>
    <?php } ?>
  </div>
</main>

<?php require_once MAIN_FOOT ?>