<?php require_once MAIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<main class="p-3 d-flex flex-column col-10 mx-auto">
  <?php Flasher::flasher() ?>
  <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark mb-3">List Anime</h2>
  <div class="p-3 mb-3 col-12 d-flex flex-column border border-1 border-dark">
    <?php foreach($data['animes'] as $anime) { ?>
      <a href="<?= BASE_URL.'/animes/x/'.$anime['slug'] ?>" class="animes-item"><?= $anime['title'] ?></a>
    <?php } ?>
  </div>
</main>

<?php require_once MAIN_FOOT ?>