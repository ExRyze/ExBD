<?php

class Middleware {

  public function auth($status = true) {
    if($status === true && !isset($_SESSION['user'])) {
      header('location: '.BASE_URL.'/login');
    } else if($status === false && isset($_SESSION['user'])) {
      header('location: '.BASE_URL);
    }
  }

}