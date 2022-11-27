<?php

class Dashboard extends Controller {

  public function index() {
    $this->middleware->auth();
    $data['page'] = 'ExBD | Dashboard';
    $this->view('dashboard/index', $data);
  }

}