<?php

class Register extends Controller {

  public function index() {
    Middleware::auth(false);
    $data['page'] = 'ExBD | Register';
    $this->view('authentication/register', $data);
  }

  public function Cregister() {
    Middleware::auth(false);
    if(isset($_POST)) {
      $this->model('Users')->store($_POST);
      header('location: '.BASE_URL.'/login');
    } else {
      header('location: '.BASE_URL.'/register');
    }
  }

}