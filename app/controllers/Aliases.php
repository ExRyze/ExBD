<?php

class Aliases extends Controller {

  public function animes() {
    Middleware::role('Admin');
    $row = $this->model('Animes_Aliases')->store();
    if($row) {
      Flasher::setFlasher('flasher-success', 'Anime alias berhasil di tambahkan');
    } else {
      Flasher::setFlasher('flasher-warning', 'Terjadi suatu kesalahan!');
    }
    return header('location: '.BASE_URL.'/admin/animes');
  }

}