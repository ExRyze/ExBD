<?php

class Admin extends Controller {

  public function index() {
    Middleware::role('Admin');
    $data['page'] = 'EXBD | Admin - Database';
    $data['database'] = array(
      'users' => array('key' => 'Users', 'value' => $this->model('Users')->countAllByRole(), 'by' => 'role'),
      'animes' => array('key' => 'Animes', 'value' => $this->model('Animes')->countAllByType(), 'by' => 'type'));
    return $this->view('admin/index', $data);
  }

  public function users() {
    Middleware::role('Admin');
    $data['page'] = 'EXBD | Admin - Users';
    $data['users'] = $this->model('Users')->getAll();
    return $this->view('admin/users', $data);
  }

  public function animes() {
    Middleware::role('Admin');
    $data['page'] = 'EXBD | Admin - Animes';
    $data['anime_id'] = $this->model('Animes')->getTitle();
    $data['animes'] = $this->model('Animes')->getAll();
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Aliases')->getAll(), 'aliases', NULL, TRUE);
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Genres')->getAll(), 'genres', 'genre');
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Themes')->getAll(), 'themes', 'theme');
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Licensors')->getAll(),'licensors','licensor');
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Producers')->getAll(),'producers','producer');
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Studios')->getAll(), 'studios', 'studio');
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Relations')->getAll(), 'relations', NULL, TRUE);
    $data['genres'] = $this->model('Genres')->getAll();
    $data['themes'] = $this->model('Themes')->getAll();
    $data['producers'] = $this->model('Producers')->getAll();
    $data['licensors'] = $this->model('Licensors')->getAll();
    $data['studios'] = $this->model('Studios')->getAll();
    return $this->view('admin/animes', $data);
  }

  public function animesvideos($history = '') {
    Middleware::role('Admin');
    $data['anime_id'] = $this->model('Animes')->getTitle();
    if($history === 'history') {
      $data['page'] = 'EXBD | Admin - Animes Videos History';
      $data['key'] = 'history';
      $data['animes'] = $this->model('Animes')->getVideosHistory();
      return $this->view('admin/animesVideos', $data);
    }
    $data['page'] = 'EXBD | Admin - Animes Videos';
    $data['animes'] = $this->model('Animes')->getVideos();
    return $this->view('admin/animesVideos', $data);
  }

  public function parts($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      $data['page'] = 'EXBD | Admin - Parts';
      $data['database'] = array(
        'genres' => array('table' => $this->model('Genres')->getAll(), 'column' => 'genre'),
        'themes' => array('table' => $this->model('Themes')->getAll(), 'column' => 'theme'),
        'producers' => array('table' => $this->model('Producers')->getAll(), 'column' => 'producer'),
        'licensors' => array('table' => $this->model('Licensors')->getAll(), 'column' => 'licensor'),
        'studios' => array('table' => $this->model('Studios')->getAll(), 'column' => 'studio'));
      return $this->view('admin/parts', $data);
    }
  }

  public function addAnimePart($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return Functions::back();}
    if($this->model('Animes_'.$string)->validate()) {
      Flasher::setFlasher('flasher-warning', $string.' sudah ada');
      return Functions::back();}
    if(!$this->model('Animes_'.$string)->store()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return Functions::back();}
    Flasher::setFlasher('flasher-success', "Anime {$string} berhasil di tambahkan");
    return Functions::back();
  }

  public function editAnimePart($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return Functions::back();}
    if(!$this->model('Animes_'.$string)->update()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return Functions::back();
    }
    Flasher::setFlasher('flasher-success', "Anime {$string} berhasil di update");
    return Functions::back();
  }

  public function deleteAnimePart($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return Functions::back();}
    if(!$this->model('Animes_'.$string)->delete()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return Functions::back();}
    Flasher::setFlasher('flasher-success', "Anime {$string} berhasil di hapus");
    return Functions::back();
  }

  public function addParts($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return Functions::back();}
    if($this->model($string)->validate()) {
      Flasher::setFlasher('flasher-warning', $string.' sudah ada');
      return Functions::back();}
    if(!$this->model($string)->store()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return Functions::back();}
    Flasher::setFlasher('flasher-success', "{$string} berhasil di tambahkan");
    return Functions::back();
  }

  public function editParts($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return Functions::back();}
    if(!$this->model($string)->update()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return Functions::back();
    }
    Flasher::setFlasher('flasher-success', "{$string} berhasil di update");
    return Functions::back();
  }

  public function deleteParts($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return Functions::back();}
    if(!$this->model($string)->delete()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return Functions::back();}
    Flasher::setFlasher('flasher-success', "{$string} berhasil di hapus");
    return Functions::back();
  }

  public function addPartsAnimePart($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return Functions::back();}
    if($this->model($string)->validate()) {
      Flasher::setFlasher('flasher-warning', $string.' sudah ada');
      return Functions::back();}
    if(!$this->model($string)->storeLinked()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return Functions::back();}
    Flasher::setFlasher('flasher-success', "Anime {$string} berhasil di tambahkan");
    return Functions::back();
  }

  public function deleteAnimesVideos() {
    Middleware::role('Admin');
    if(!$this->model('Animes_Videos')->hardDelete()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return Functions::back();}
    Flasher::setFlasher('flasher-success', "Anime videos berhasil di hapus");
    return Functions::back();
  }

  public function revertAnimesVideos() {
    Middleware::role('Admin');
    if(!$this->model('Animes_Videos')->revert()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return Functions::back();}
    Flasher::setFlasher('flasher-success', "Anime videos berhasil di revert");
    return Functions::back();
  }

}