<?php require_once MAIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<main class="d-flex flex-column align-items-center">
  <div class="card-body col-12">
    <?php Flasher::flasher() ?>
    <h2 class="col-12 pb-2 m-0 border-bottom border-4 border-dark mb-3">New Added Animes</h2>
    <div class="d-flex align-items-stretch">
      <div class="col-12 card card-body bg-secondary">
        <div class="carousel slide carousel-animes col-8" id="carouselNewAddedAnimes" data-bs-ride="carousel">
          <div class="carousel-indicators scrollbar-none">
          <?php $idx = 1; $index = 0; foreach($data['animes'] as $anime) { ?>
            <button  type="button" data-bs-target="#carouselNewAddedAnimes" data-bs-slide-to="<?= $index ?>" aria-current="true" aria-label="Slide <?= $idx ?>" index="<?= $idx ?>" class="border border-1 border-dark text-decoration-none text-dark" style="width: 100%!important;">
              <div class="p-2  text-start">
                <h5 class="mb-1"><?= $anime['title'] ?></h5>
                <p class="m-0"><?= $anime['episodes'] ?> Episodes</p>
              </div>
            </button>
          <?php $idx += 1; $index += 1; } ?>
          </div>
          <div class="carousel-inner">
          <?php foreach($data['animes'] as $i => $anime) { ?>
            <a href="<?= BASE_URL.'/animes/anime/'.$anime['slug'] ?>" class="carousel-item <?= ($i === 0)? 'active' : '' ?>" id="<?= $anime['id'] ?>">
              <img class="d-block" src="<?= STORAGE_ANIMES.'/'.str_replace('_', ' ', $anime['slug']).'/img/Banner.jpg' ?>">
            </a>
          <?php } ?>
          </div>
          <button class="carousel-control-prev" data-bs-target="#carouselNewAddedAnimes" type="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" data-bs-target="#carouselNewAddedAnimes" type="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!--  <div class="col-4">
        <div class="d-flex flex-wrap col-12 gap-3">
          <?php foreach($data['animes'] as $anime) { ?>
            <a href="<?= BASE_URL.'/animes/x/'.$anime['slug'] ?>" class="col-12 border border-1 border-dark text-decoration-none text-dark carousel-animes-card">
              <div class="p-2">
                <h5 class="mb-1"><?= $anime['title'] ?></h5>
                <p class="m-0"><?= $anime['episodes'] ?> Episodes</p>
              </div>
            </a>
          <?php } ?>
        </div>

      </div> -->
    </div>
  </div>
</main>

<?php require_once MAIN_FOOT ?>