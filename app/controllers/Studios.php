<?php 

class Studios extends Controller {

  public function animes() {
    Middleware::role('Admin');
    if(!$this->model('Animes_Studios')->validate()) {
      if($this->model('Animes_Studios')->store()) {
        Flasher::setFlasher('flasher-success', 'Studio berhasil di tambahkan');
      } else {
        Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      }
    } else {
      Flasher::setFlasher('flasher-warning', 'Studio sudah ada');
    }
    return header('location: '.BASE_URL.'/admin/animes');
  }

}