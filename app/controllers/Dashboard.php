<?php

class Dashboard extends Controller {

  public function index() {
    $data['page'] = 'ExBD | Dashboard';
    $data['animes'] = $this->model('Animes')->getNewAddedLimit(10);
    $this->view('dashboard/index', $data);
  }

}