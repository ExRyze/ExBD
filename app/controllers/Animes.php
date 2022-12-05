<?php

class Animes extends Controller {

  public function index() {
    $data['page'] = 'EXBD | Animes';
    $data['animes'] = $this->model('Animes')->getAll();
    $this->view('animes/index', $data);
  }

  public function x($slug) {
    $data['page'] = 'EXBD | Anime '.$slug;
    $data['anime'] = $this->model('Animes')->getAnimeBySlug($slug);
    $this->view('animes/anime', $data);
  }
  
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
        return header('location: '.BASE_URL.'/admin/animes');
      } else {
        Flasher::setFlasher('flasher-warning', 'Terjadi suatu kesalahan!');
        return header('location: '.BASE_URL.'/animes/add');
      }
    }
  }

  public function edit($id = NULL) {
    Middleware::role('Admin');
    if($id === NULL) {
      Flasher::setFlasher('flasher-danger', 'Tidak ada data yang ditangkap');
      return header('location: '.BASE_URL.'/admin/users');
    }
    $data['page'] = 'EXBD | Animes - Edit';
    $data['anime'] = $this->model('Animes')->getAnimeById($id);
    $this->view('animes/edit', $data);
  }

  public function update() {
    Middleware::role('Admin');
    $row = $this->model('Animes')->update();
    if($row) {
      Flasher::setFlasher('flasher-success', 'Data anime telah di perharui');
      return header('location: '.BASE_URL.'/admin/animes');
    } else {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan');
      return header('location: '.BASE_URL.'/admin/animes');
    }
  }

  public function delete($id = NULL) {
    Middleware::role('Admin');
    if($id === NULL) {
      Flasher::setFlasher('flasher-danger', 'Tidak ada data yang ditangkap');
      return header('location: '.BASE_URL.'/admin/animes');
    }
    $row = $this->model('Animes')->delete($id);
    if($row) {
      Flasher::setFlasher('flasher-success', 'Data anime berhasil di hapus');
      return header('location: '.BASE_URL.'/admin/animes');
    } else {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan');
      return header('location: '.BASE_URL.'/admin/animes');
    }
  }

}