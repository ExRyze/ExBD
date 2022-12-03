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
    $this->view('admin/animes', $data);
  }

}