<?php

class Users extends Controller {

  public function user($uname = NULL) {
    if(!$uname) {Functions::back();}
    $data['user'] = $this->model('Users')->get($uname);
    if($data['user']) {
      $data['page'] = 'ExBD | User - '.$data['user']['username'];
      return $this->view('user/index', $data);
    } return Functions::back();
  }

  public function active($id = NULL) {
    Middleware::role('Admin');
    if($id === NULL) {
      Flasher::setFlasher('flasher-danger', 'Tidak ada data yang ditangkap');
      return Functions::back();
    }
    $row = $this->model('Users')->updateStatus($id, 'Active');
    if($row) {
      Flasher::setFlasher('flasher-success', 'Status User telah di aktifkan');
      return Functions::back();
    } else {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan');
      return Functions::back();
    }
  }

  public function suspend($id = NULL) {
    Middleware::role('Admin');
    if($id === NULL) {
      Flasher::setFlasher('flasher-danger', 'Tidak ada data yang ditangkap');
      return Functions::back();
    }
    $row = $this->model('Users')->updateStatus($id, 'Suspended');
    if($row) {
      Flasher::setFlasher('flasher-success', 'Status User telah di tangguhkan');
      return Functions::back();
    } else {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan');
      return Functions::back();
    }
  }

  public function delete($id = NULL) {
    Middleware::role('Admin');
    if($id === NULL) {
      Flasher::setFlasher('flasher-danger', 'Tidak ada data yang ditangkap');
      return Functions::back();
    }
    $row = $this->model('Users')->delete($id);
    if($row) {
      Flasher::setFlasher('flasher-success', 'Data user berhasil di hapus');
      return Functions::back();
    } else {
      Flasher::setFlasher('flasher-danger', 'Terjadi suatu kesalahan');
      return Functions::back();
    }
  }

}