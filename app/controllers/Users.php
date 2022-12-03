<?php

class Users extends Controller {

  public function active($id = NULL) {
    Middleware::role('Admin');
    if($id === NULL) {
      Flasher::setFlasher('flasher-danger', 'Tidak ada data yang ditangkap');
      return header('location: '.BASE_URL.'/admin/users');
    }
    $row = $this->model('Users')->updateStatus($id, 'Active');
    if($row) {
      Flasher::setFlasher('flasher-success', 'Status User telah di aktifkan');
      return header('location: '.BASE_URL.'/admin/users');
    } else {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan');
      return header('location: '.BASE_URL.'/admin/users');
    }
  }

  public function suspend($id = NULL) {
    Middleware::role('Admin');
    if($id === NULL) {
      Flasher::setFlasher('flasher-danger', 'Tidak ada data yang ditangkap');
      return header('location: '.BASE_URL.'/admin/users');
    }
    $row = $this->model('Users')->updateStatus($id, 'Suspended');
    if($row) {
      Flasher::setFlasher('flasher-success', 'Status User telah di tangguhkan');
      return header('location: '.BASE_URL.'/admin/users');
    } else {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan');
      return header('location: '.BASE_URL.'/admin/users');
    }
  }

  public function delete($id = NULL) {
    Middleware::role('Admin');
    if($id === NULL) {
      Flasher::setFlasher('flasher-danger', 'Tidak ada data yang ditangkap');
      return header('location: '.BASE_URL.'/admin/users');
    }
    $row = $this->model('Users')->delete($id);
    if($row) {
      Flasher::setFlasher('flasher-success', 'Data user berhasil di hapus');
      return header('location: '.BASE_URL.'/admin/users');
    } else {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan');
      return header('location: '.BASE_URL.'/admin/users');
    }
  }

}