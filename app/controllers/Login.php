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
    if(!isset($_SESSION['flasher'])) {
      $row = $this->model('Users')->authentication();
      if($row) {
        $_SESSION['user'] = $row;
        Flasher::setFlasher('flasher-success', 'Berhasil login!');
        header('location: '.BASE_URL);
      } else {
        Flasher::setFlasher('flasher-warning', 'Username atau Password salah!');
        header('location: '.BASE_URL.'/login');
      }
    } else {
      header('location: '.BASE_URL.'/login');
    }
    
  }

  public function logout() {
    session_destroy();
    header('location: '.BASE_URL.'/login');
  }

}