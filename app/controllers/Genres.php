<?php 

class Genres extends Controller {

  public function animes() {
    Middleware::role('Admin');
    var_dump($_POST);
    $row = $this->model('Animes_Genres')->store();
    if($row) {
      Flasher::setFlasher('flasher-success', 'Genre berhasil di tambahkan');
    } else {
      Flasher::setFlasher('flasher-warning', 'Terjadi suatu kesalahan!');
    }
    return header('location: '.BASE_URL.'/admin/animes');
  }

}