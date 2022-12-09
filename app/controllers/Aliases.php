<?php

class Aliases extends Controller {

  public function animes() {
    Middleware::role('Admin');
    if(!$this->model('Animes_Aliases')->validate()) {
      if($this->model('Animes_Aliases')->store()) {
        Flasher::setFlasher('flasher-success', 'Anime alias berhasil di tambahkan');
      } else {
        Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      }
    } else {
      Flasher::setFlasher('flasher-warning', 'Alias sudah ada');
    }
    return header('location: '.BASE_URL.'/admin/animes');
  }

}