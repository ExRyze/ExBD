<?php

class Register extends Controller {

  public function index() {
    $this->middleware->auth(false);
    $data['page'] = 'ExBD | Register';
    $this->view('authentication/register', $data);
  }

  public function Cregister() {
    $this->middleware->auth(false);
    if(isset($_POST)) {
      $this->model('Users')->store($_POST);
      header('location: '.BASE_URL.'/login');
    } else {
      header('location: '.BASE_URL.'/register');
    }
  }

}