<?php

class Middleware {

  public static function auth($status = true) {
    if($status === true && !isset($_SESSION['user'])) {
      return header('location: '.BASE_URL.'/login');
    } else if($status === false && isset($_SESSION['user'])) {
      return header('location: '.BASE_URL);
    }
  }

  public static function role($role) {
    if(!isset($_SESSION['user'])) { 
      if($_SESSION['user']['role'] != $role) {
        return header('location: '.BASE_URL);
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