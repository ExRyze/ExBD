<?php 

class Logout extends Controller {

  public function index() {
    session_destroy();
    return header('location: '.BASE_URL.'/login');
  }
  
}