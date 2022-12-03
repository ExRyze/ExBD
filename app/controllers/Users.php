<?php

class Users extends Controller {
  
  public function delete($id) {
    Middleware::role('Admin');
    if(empty($id)) {header('location: '.BASE_URL.'/admin/users');}
    $row = $this->model('Users')->delete($id);
    if($row) {
      Flasher::setFlasher('flasher-success', 'Data user berhasil di hapus');
      header('location: '.BASE_URL.'/admin/users');
    } else {
      Flasher::setFlasher('flasher-error', 'terjadi suatu kesalahan');
      header('location: '.BASE_URL.'/admin/users');
    }
  }

  public function active($id) {
    Middleware::role('Admin');
    if(empty($id)) {header('location: '.BASE_URL.'/admin/users');}
    $row = $this->model('Users')->updateStatus($id, 'Active');
    if($row) {
      Flasher::setFlasher('flasher-success', 'Status User telah di aktifkan');
      header('location: '.BASE_URL.'/admin/users');
    } else {
      Flasher::setFlasher('flasher-error', 'terjadi suatu kesalahan');
      header('location: '.BASE_URL.'/admin/users');
    }
  }

  public function suspend($id) {
    Middleware::role('Admin');
    if(empty($id)) {header('location: '.BASE_URL.'/admin/users');}
    $row = $this->model('Users')->updateStatus($id, 'Suspended');
    if($row) {
      Flasher::setFlasher('flasher-success', 'Status User telah di tangguhkan');
      header('location: '.BASE_URL.'/admin/users');
    } else {
      Flasher::setFlasher('flasher-error', 'terjadi suatu kesalahan');
      header('location: '.BASE_URL.'/admin/users');
    }
  }

}