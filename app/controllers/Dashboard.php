<?php

class Dashboard extends Controller {

  public function index() {
    $data['page'] = 'ExBD | Dashboard';
    $this->view('dashboard/index', $data);
  }

}