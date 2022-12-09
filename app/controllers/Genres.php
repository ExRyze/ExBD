<?php 

class Genres extends Controller {

  public function animes() {
    Middleware::role('Admin');
    if(!$this->model('Animes_Genres')->validate()) {
      if($this->model('Animes_Genres')->store()) {
        Flasher::setFlasher('flasher-success', 'Genre berhasil di tambahkan');
      } else {
        Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      }
    } else {
      Flasher::setFlasher('flasher-warning', 'Genre sudah ada');
    }
    return header('location: '.BASE_URL.'/admin/animes');
  }

}