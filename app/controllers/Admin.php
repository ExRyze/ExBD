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

}