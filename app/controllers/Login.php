<?php

class Login extends Controller {

  public function index() {
    $data['page'] = 'ExBD | Login';
    $this->view('authentication/login', $data);
  }

  public function Clogin() {
    if(isset($_POST)) {
      $row = $this->model('Users')->auth($_POST);
      if($row) {
        header('location: '.BASE_URL.'/dashboard');
      } else {
        header('location: '.BASE_URL.'/login');
      }
    } else {
      header('location: '.BASE_URL.'/login');
    }
  }

}