<?php

class Admin extends Controller {

  public function index() {
    Middleware::role('Admin');
    $data['page'] = 'EXBD | Admin - Database';
    $data['database'] = array(
      'users' => array('key' => 'Users', 'value' => $this->model('Users')->countAllByRole(), 'by' => 'role'),
      'animes' => array('key' => 'Animes', 'value' => $this->model('Animes')->countAllByType(), 'by' => 'type'));
    $this->view('admin/index', $data);
  }

  public function users() {
    Middleware::role('Admin');
    $data['page'] = 'EXBD | Admin - Users';
    $data['users'] = $this->model('Users')->getAll();
    $this->view('admin/users', $data);
  }

  public function animes() {
    Middleware::role('Admin');
    $data['page'] = 'EXBD | Admin - Animes';
    $data['animes'] = $this->model('Animes')->getAll();
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Aliases')->getAll(), 'aliases', NULL, TRUE);
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Genres')->getAll(), 'genres', 'genre');
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Licensors')->getAll(),'licensors','licensor');
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Producers')->getAll(),'producers','producer');
    $data['animes'] = Functions::dockingAnime($data['animes'], $this->model('Animes_Studios')->getAll(), 'studios', 'studio');
    $data['genres'] = $this->model('Genres')->getAll();
    $data['producers'] = $this->model('Producers')->getAll();
    $data['licensors'] = $this->model('Licensors')->getAll();
    $data['studios'] = $this->model('Studios')->getAll();
    $this->view('admin/animes', $data);
  }

  public function animesVideos() {
    Middleware::role('Admin');
    $data['page'] = 'EXBD | Admin - Animes Videos';
    $data['animes'] = $this->model('Animes')->getJoin('_videos');
    $data['anime_id'] = $this->model('Animes')->getTitle();
    $data['anime_id'] = Functions::filterAnime($data['anime_id'], $data['animes']);
    // var_dump($data['anime_id']);
    $this->view('admin/animesVideos', $data);
  }

  public function parts($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      $data['page'] = 'EXBD | Admin - Parts';
      $data['database'] = array(
        'genres' => array('table' => $this->model('Genres')->getAll(), 'column' => 'genre'),
        'producers' => array('table' => $this->model('Producers')->getAll(), 'column' => 'producer'),
        'licensors' => array('table' => $this->model('Licensors')->getAll(), 'column' => 'licensor'),
        'studios' => array('table' => $this->model('Studios')->getAll(), 'column' => 'studio'));
      $this->view('admin/parts', $data);
    }
  }

  public function addAnimePart($string = '', $url = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return header('location: '.BASE_URL.'/admin/animes'.$url);}
    if($this->model('Animes_'.$string)->validate()) {
      Flasher::setFlasher('flasher-warning', $string.' sudah ada');
      return header('location: '.BASE_URL.'/admin/animes'.$url);}
    if(!$this->model('Animes_'.$string)->store()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return header('location: '.BASE_URL.'/admin/animes'.$url);}
    Flasher::setFlasher('flasher-success', "Anime {$string} berhasil di tambahkan");
    return header('location: '.BASE_URL.'/admin/animes'.$url);
  }

  public function editAnimePart($string = '', $url = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return header('location: '.BASE_URL.'/admin/animes'.$url);}
    if(!$this->model('Animes_'.$string)->update()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return header('location: '.BASE_URL.'/admin/animes'.$url);
    }
    Flasher::setFlasher('flasher-success', "Anime {$string} berhasil di update");
    return header('location: '.BASE_URL.'/admin/animes'.$url);
  }

  public function deleteAnimePart($string = '', $url = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return header('location: '.BASE_URL.'/admin/animes'.$url);}
    if(!$this->model('Animes_'.$string)->delete()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return header('location: '.BASE_URL.'/admin/animes'.$url);}
    Flasher::setFlasher('flasher-success', "Anime {$string} berhasil di hapus");
    return header('location: '.BASE_URL.'/admin/animes'.$url);
  }

  public function addParts($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return header('location: '.BASE_URL.'/admin/parts');}
    if($this->model($string)->validate()) {
      Flasher::setFlasher('flasher-warning', $string.' sudah ada');
      return header('location: '.BASE_URL.'/admin/parts');}
    if(!$this->model($string)->store()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return header('location: '.BASE_URL.'/admin/parts');}
    Flasher::setFlasher('flasher-success', "{$string} berhasil di tambahkan");
    return header('location: '.BASE_URL.'/admin/parts');
  }

  public function editParts($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return header('location: '.BASE_URL.'/admin/parts');}
    if(!$this->model($string)->update()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return header('location: '.BASE_URL.'/admin/parts');
    }
    Flasher::setFlasher('flasher-success', "{$string} berhasil di update");
    return header('location: '.BASE_URL.'/admin/parts');
  }

  public function deleteParts($string = '') {
    Middleware::role('Admin');
    if($string === '') {
      Flasher::setFlasher('flasher-warning', 'Need parameter');
      return header('location: '.BASE_URL.'/admin/parts');}
    if(!$this->model($string)->delete()) {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      return header('location: '.BASE_URL.'/admin/parts');}
    Flasher::setFlasher('flasher-success', "{$string} berhasil di hapus");
    return header('location: '.BASE_URL.'/admin/parts');
  }

}