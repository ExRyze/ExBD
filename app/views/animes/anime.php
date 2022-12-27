<?php require_once MAIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<main class="d-flex flex-column bg-primary p-0">
  <?php Flasher::flasher() ?>
  <h4 class="col-12 bg-secondary p-3 m-0 rounded-top text-dark"><?= $data['anime']['title'] ?></h4>
  <div class="d-flex col-12">
    <section class="col-3 p-2 bg-white me-3 rounded-bottom">
      <div class="p-2 border border-2 border-dark d-flex flex-column gap-3">
        <div class="col-12 d-flex justify-content-center">
          <img src="<?= STORAGE_ANIMES.'/'.$data['anime']['title'].'/img/Cover.jpg' ?>" class="col-12 p-3 pb-0">
        </div>
        <div class="d-flex flex-column">
          <h5 class="pb-1 border-bottom border-1 border-dark mb-2">Another Title</h5>
          <?php foreach($data['aliases'] as $alias) { ?>
            <p class="m-0"><strong><?= $alias['origin_alias'] ?> : </strong><br><?= $alias['anime_alias'] ?></p>
          <?php } ?>
        </div>
        <div class="d-flex flex-column">
          <h5 class="pb-1 border-bottom border-1 border-dark mb-2">Informations</h5>
          <p class="m-0"><strong>Type: </strong><?= $data['anime']['type'] ?></p>
          <p class="m-0"><strong>Episodes: </strong><?= $data['anime']['episodes'] ?></p>
          <p class="m-0"><strong>Status: </strong><?= $data['anime']['status'] ?></p>
          <?= ($data['anime']['aired']) ? "<p class='m-0'><strong>Aired: </strong>".date('M d, Y', strtotime($data['anime']['aired']))."<small> to </small>".date('M d, Y', strtotime($data['anime']['finished']))."</p>" : '' ?>
          <p class="m-0"><?php $string = '<strong>Producers: </strong>'; foreach($data['producers'] as $producer) {$string .= "<a class='anime-part' href=''>{$producer['producer']}</a>, ";} echo substr($string, 0, -2); unset($string); ?></p>
          <p class="m-0"><?php $string = '<strong>Licensors: </strong>'; foreach($data['licensors'] as $licensor) {$string .= "<a class='anime-part' href=''>{$licensor['licensor']}</a>, ";} echo substr($string, 0, -2); unset($string); ?></p>
          <p class="m-0"><?php $string = '<strong>Studios: </strong>'; foreach($data['studios'] as $studio) {$string .= "<a class='anime-part' href=''>{$studio['studio']}</a>, ";} echo substr($string, 0, -2); unset($string); ?></p>
          <p class="m-0"><?php $string = '<strong>Genres: </strong>'; foreach($data['genres'] as $genre) {$string .= "<a class='anime-part' href=''>{$genre['genre']}</a>, ";} echo substr($string, 0, -2); unset($string); ?></p>
          <p class="m-0"><?php $string = '<strong>Themes: </strong>'; foreach($data['themes'] as $theme) {$string .= "<a class='anime-part' href=''>{$theme['theme']}</a>, ";} echo substr($string, 0, -2); unset($string); ?></p>
        </div>
      </div>
    </section>
    <section class="flex-grow-1 p-2 bg-white rounded-bottom">

    </section>
  </div>
</main>

<?php require_once MAIN_FOOT ?>