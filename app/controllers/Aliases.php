<?php

class Aliases extends Controller {

  public function animes() {
    Middleware::role('Admin');
    $row = $this->model('Animes_Aliases')->store();
    if($row) {
      Flasher::setFlasher('flasher-success', 'Anime berhasil di tambahkan');
      return header('location: '.BASE_URL.'/admin/animes');
    } else {
      Flasher::setFlasher('flasher-warning', 'Terjadi suatu kesalahan!');
      return header('location: '.BASE_URL.'/animes/add');
    }
  }

}