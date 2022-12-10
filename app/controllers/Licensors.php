<?php 

class Licensors extends Controller {

  public function animes() {
    Middleware::role('Admin');
    if(!$this->model('Animes_Licensors')->validate()) {
      if($this->model('Animes_Licensors')->store()) {
        Flasher::setFlasher('flasher-success', 'Licensor berhasil di tambahkan');
      } else {
        Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      }
    } else {
      Flasher::setFlasher('flasher-warning', 'Licensor sudah ada');
    }
    return header('location: '.BASE_URL.'/admin/animes');
  }

}