<?php

class Dashboard extends Controller {

  public function index() {
    Middleware::auth();
    $data['page'] = 'ExBD | Dashboard';
    $this->view('dashboard/index', $data);
  }

}