<?php

class Dashboard extends Controller {

  public function index() {
    $data = $this->model('Animes')->count();
    $this->view('dashboard/index', $data);
  }

}