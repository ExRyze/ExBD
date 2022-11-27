<?php

class Login extends Controller {

  public function index() {
    $this->middleware->auth(false);
    $data['page'] = 'ExBD | Login';
    $this->view('authentication/login', $data);
  }

  public function Clogin() {
    $this->middleware->auth(false);
    if(isset($_POST)) {
      $row = $this->model('Users')->authentication($_POST);
      if($row) {
        $_SESSION['user'] = $row;
        header('location: '.BASE_URL);
      } else {
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