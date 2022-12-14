<?php require_once MAIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<main class="p-3 col-10 mx-auto d-flex flex-column">
  <h4 class="col-12 bg-primary p-3 m-0 rounded-top text-white border border-bottom-0 border-1 border-dark"><?= $data['anime']['title'] ?></h4>
  <div class="d-flex col-12 border border-top-0 border-1 border-dark rounded-bottom">
    <section class="col-4 p-2 border-end border-1 border-dark">
      <div class="d-flex flex-column mb-3">
        <h5 class="pb-1 border-bottom border-1 border-dark mb-2">Title</h5>
        <p class="m-0"><?= $data['anime']['title'] ?></p>
      </div>
      <!-- <div class="d-flex flex-column mb-3">
        <h5 class="pb-1 border-bottom border-1 border-dark mb-2">Informations</h5>
        <p class="m-0"><strong>Type: </strong><?= $data['anime']['type'] ?></p>
        <p class="m-0"><strong>Episodes: </strong><?= $data['anime']['episodes'] ?></p>
        <p class="m-0"><strong>Aired: </strong><?= date('d M Y', strtotime($data['anime']['aired'])) ?></p>
        <p class="m-0"><strong>Finished: </strong><?= date('d M Y', strtotime($data['anime']['finished'])) ?></p>
      </div> -->
    </section>
    <section class="flex-grow-1 p-2">
      <!-- <video width="720" height="480" controls>
        <source src="/video/Animes/Kono Subarashii Sekai ni Shukufuku wo! 2/Kono Subarashii Sekai ni Shukufuku wo! 2 Episode 01 – Koenime BD 1080p.mkv" type="video/mp4">
      </video> -->
      <embed src="" type="application/x-vlc-plugin" pluginspage="http://www.videolan.org" version="VideoLAN.VLCPlugin.2" width="720" height="480" target="/video/Animes/Kono Subarashii Sekai ni Shukufuku wo! 2/Kono Subarashii Sekai ni Shukufuku wo! 2 Episode 01 – Koenime BD 1080p.mkv" id="vlc">
      <br>
      <?php var_dump($data['anime']) ?>
      
      <?= STORAGE_ANIMES.'/'.$data['anime']['title'].'/'.$data['anime']['title'].' Episode '.$data['anime']['episode'].' – '. $data['anime']['source_videos'].' '.$data['anime']['type'].' 1080p.'.$data['anime']['type_videos'] ?>
    </section>
  </div>
</main>

<?php require_once MAIN_FOOT ?>