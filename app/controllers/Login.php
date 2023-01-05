<?php

class Login extends Controller {

  public function index() {
    Middleware::auth(false);
    $data['page'] = 'ExBD | Login';
    $this->view('authentication/login', $data);
  }

  public function Clogin() {
    Middleware::auth(false);
    Middleware::form($_POST);
    $row = $this->model('Users')->authentication();
    if($row) {
      $_SESSION['user'] = $row;
      Flasher::setFlasher('flasher-success', 'Berhasil login!');
      unset($row);
      return header('location: '.BASE_URL);
    } else {
      Flasher::setFlasher('flasher-warning', 'Username atau Password salah!');
      return header('location: '.BASE_URL.'/login');
    }
  }

}