<?php

class Register extends Controller {

  public function index() {
    Middleware::auth(false);
    $data['page'] = 'ExBD | Register';
    $this->view('authentication/register', $data);
  }

  public function Cregister() {
    Middleware::auth(false);
    Middleware::form($_POST);
    if(!isset($_SESSION['flasher'])) {
      $row = $this->model('Users')->searchByUsername();
      if(!$row) {
        $this->model('Users')->store();
        Flasher::setFlasher('flasher-success', 'Data berhasil ditambahkan, silahkan login');
        header('location: '.BASE_URL.'/login');
      } else {
        Flasher::setFlasher('flasher-warning', 'Username sudah dipakai User lain');
        header('location: '.BASE_URL.'/register');
      }
    } else {
      header('location: '.BASE_URL.'/register');
    }
  }

}