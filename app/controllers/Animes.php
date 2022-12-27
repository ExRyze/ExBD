<?php

class Animes extends Controller {

  public function index() {
    return header("location: ".BASE_URL.'/animes/list');
  }

  public function anime($slug = NULL) {
    if(!$slug) {return header("location: ".BASE_URL.'/animes/list');}
    $data['page'] = 'EXBD | Anime '.$slug;
    $data['anime'] = $this->model('Animes')->getAnimeBySlug($slug);
    $data['aliases'] = $this->model('Animes_Aliases')->getAliasesBySlug($slug);
    $data['producers'] = $this->model('Animes_Producers')->getAliasesBySlug($slug);
    $data['licensors'] = $this->model('Animes_Licensors')->getAliasesBySlug($slug);
    $data['studios'] = $this->model('Animes_Studios')->getAliasesBySlug($slug);
    $data['genres'] = $this->model('Animes_Genres')->getAliasesBySlug($slug);
    $data['themes'] = $this->model('Animes_Themes')->getAliasesBySlug($slug);
    $this->view('animes/anime', $data);
  }

  public function list() {
    $data['page'] = 'EXBD | Animes';
    $data['animes'] = $this->model('Animes')->getAll();
    $this->view('animes/list', $data);
  }

  public function video($slug = NULL, $eps = '01') {
    if(!$slug) {return header("location: ".BASE_URL.'/animes');}
    Flasher::setFlasher('flasher-warning', 'The path to video is currently disabled...');
    header('location: '.BASE_URL.'/animes/x/'.$slug);
    // $data['page'] = 'EXBD | Nonton '.$slug;
    // $data['anime'] = $this->model('Animes')->getVideo($slug);
    // $data['anime']['episode'] = $eps;
    // $this->view('animes/video', $data);
  }

  public function store() {
    Middleware::role('Admin');
    if($_POST['aired'] === '') {$_POST['aired'] = NULL;}
    if($_POST['finished'] === '') {$_POST['finished'] = NULL;}
    if($this->model('Animes')->validate()) {
      Flasher::setFlasher('flasher-warning', 'Anime sudah ada');
      return header('location: '.BASE_URL.'/admin/animes');}
    if(!$this->model('Animes')->store()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return header('location: '.BASE_URL.'/admin/animes');
    }
    Flasher::setFlasher('flasher-success', 'Anime berhasil di tambahkan');
    return header('location: '.BASE_URL.'/admin/animes');
  }

  public function update() {
    Middleware::role('Admin');
    if($_POST['aired'] === '') {$_POST['aired'] = NULL;}
    if($_POST['finished'] === '') {$_POST['finished'] = NULL;}
    if(!$this->model('Animes')->update()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan');
      return header('location: '.BASE_URL.'/admin/animes');
    }
    Flasher::setFlasher('flasher-success', 'Data anime telah di perharui');
    return header('location: '.BASE_URL.'/admin/animes');
  }

  public function delete($id = NULL) {
    Middleware::role('Admin');
    if($id === NULL) {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return header('location: '.BASE_URL.'/admin/animes');}
    if(!$this->model('Animes')->delete($id)) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan');
      return header('location: '.BASE_URL.'/admin/animes');
    }
    Flasher::setFlasher('flasher-success', 'Data anime berhasil di hapus');
    return header('location: '.BASE_URL.'/admin/animes');
  }

}