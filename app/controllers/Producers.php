<?php 

class Producers extends Controller {

  public function animes() {
    Middleware::role('Admin');
    if(!$this->model('Animes_Producers')->validate()) {
      if($this->model('Animes_Producers')->store()) {
        Flasher::setFlasher('flasher-success', 'Producer berhasil di tambahkan');
      } else {
        Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      }
    } else {
      Flasher::setFlasher('flasher-warning', 'Producer sudah ada');
    }
    return header('location: '.BASE_URL.'/admin/animes');
  }

}