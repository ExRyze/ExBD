<?php

class Login extends Controller {

  public function index() {
    Middleware::auth(false);
    $data['page'] = 'ExBD | Login';
    $this->view('authentication/login', $data);
  }

  public function Clogin() {
    Middleware::auth(false);
    if(isset($_POST)) {
      $row = $this->model('Users')->authentication($_POST);
      if($row) {
        $_SESSION['user'] = $row;
        Flasher::setFlasher('bg-success', 'Berhasil login!');
        header('location: '.BASE_URL);
      } else {
        Flasher::setFlasher('bg-warning', 'Username atau password salah!');
        header('location: '.BASE_URL.'/login');
      }
    } else {
      Flasher::setFlasher('bg-warning', 'Mohon inputkan username dan password!');
      header('location: '.BASE_URL.'/login');
    }
  }

  public function logout() {
    session_destroy();
    header('location: '.BASE_URL.'/login');
  }

}