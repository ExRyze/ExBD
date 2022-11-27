<?php

class Controller {

  protected $middleware;

  public function __construct() {
    $this->middleware = new Middleware;
  }

  public function view($view, $data = []) {
    require_once "../app/views/{$view}.php";
  }

  public function model($model) {
    require_once "../app/models/{$model}.php";
    return new $model;
  }

}