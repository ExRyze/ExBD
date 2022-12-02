<?php

class Animes extends Controller {
  
  public function add() {
    Middleware::role('Admin');
    $data['page'] = 'EXBD | Animes - Create';
    $this->view('animes/add', $data);
  }

  public function store() {
    Middleware::role('Admin');
    if(isset($_POST)) {
      $row = $this->model('Animes')->store();
      if($row) {
        Flasher::setFlasher('flasher-success', 'Anime berhasil di tambahkan');
        header('location: '.BASE_URL.'/admin/animes');
      } else {
        Flasher::setFlasher('bg-warning', 'Terjadi suatu kesalahan!');
        header('location: '.BASE_URL.'/animes/add');
      }
    }
  }

}