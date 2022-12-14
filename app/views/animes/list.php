<?php require_once MAIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<main class="d-flex flex-column animes">
  <?php Flasher::flasher() ?>
  <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark mb-3">List Anime</h2>
  <div class="p-3 col-12 d-flex flex-column border border-1 border-dark">
    <?php foreach($data['animes'] as $anime) { ?>
      <a href="<?= BASE_URL.'/animes/anime/'.$anime['slug'] ?>" class="animes-item"><?= $anime['title'] ?></a>
    <?php } ?>
  </div>
</main>

<?php require_once MAIN_FOOT ?>