<?php

class Middleware {

  public static function auth($status = true) {
    if($status === true && !isset($_SESSION['user'])) {
      return Functions::back();
    } else if($status === false && isset($_SESSION['user'])) {
      return Functions::back();
    }
  }

  public static function role($role) {
    Middleware::auth();
    if(isset($_SESSION['user'])) { 
      if($_SESSION['user']['role'] != $role) {
        return Functions::back();
      }
    }
  }

  public static function form($data) {
    foreach($data as $key => $value) {
      if(empty($value)) {
        Flasher::setFlasher('flasher-warning', $key.' is empty');
        break;
      }
    }
  }

}