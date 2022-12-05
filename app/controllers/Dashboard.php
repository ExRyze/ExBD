<?php

class Dashboard extends Controller {

  public function index() {
    $data['page'] = 'ExBD | Dashboard';
    $data['animes'] = $this->model('Animes')->getAll();
    $this->view('dashboard/index', $data);
  }

}