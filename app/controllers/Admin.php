<?php

class Admin extends Controller {

  public function index() {
    Middleware::role('Admin');
    $data['page'] = 'EXBD | Admin Dashboard';
    $this->view('admin/index', $data);
  }

}