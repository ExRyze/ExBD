<?php

class Register extends Controller {

  public function index() {
    Middleware::auth(false);
    $data['page'] = 'ExBD | Register';
    $this->view('authentication/register', $data);
  }

  public function Cregister() {
    Middleware::auth(false);
    if(!$this->model('Users')->validate()) {
      if($this->model('Users')->store()) {
        Flasher::setFlasher('flasher-success', 'Data berhasil ditambahkan, silahkan login');
        return header('location: '.BASE_URL.'/login');
      } else {
        Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      }
    } else {
      Flasher::setFlasher('flasher-warning', 'Username sudah dipakai User lain');
    }
    return header('location: '.BASE_URL.'/admin/users');
  }

  public function admin() {
    Middleware::role('Admin');
    if(!$this->model('Users')->validate()) {
      if($this->model('Users')->storeAdmin()) {
        Flasher::setFlasher('flasher-success', 'Data Admin baru berhasil ditambahkan');
      } else {
        Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan!');
      }
    } else {
      Flasher::setFlasher('flasher-warning', 'Username sudah dipakai User lain');
    }
    return header('location: '.BASE_URL.'/admin/users');
  }

}