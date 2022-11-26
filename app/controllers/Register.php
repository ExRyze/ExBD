<?php

class Register extends Controller {

  public function index() {
    // var_dump(date('Y-m-d H:i:s'));
    $data['page'] = 'ExBD | Register';
    $this->view('authentication/register', $data);
  }

  public function Cregister() {
    if(isset($_POST)) {
      $this->model('Users')->store($_POST);
      header('location: '.BASE_URL.'/login');
    } else {
      header('location: '.BASE_URL.'/register');
    }
  }

}