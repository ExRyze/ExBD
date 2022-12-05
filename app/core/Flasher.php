<?php

class Flasher {

  public static function setFlasher($type, $message) {
    $_SESSION['flasher'] = [
      'message' => $message,
      'type' => $type
    ];
  }

  public static function flasher() {
    if(isset($_SESSION['flasher'])) {
      echo 
      "<div class='flasher {$_SESSION['flasher']['type']} d-flex'>
        <p class='m-0'>".$_SESSION['flasher']['message']."</p>
        <button class='ms-auto btn-close flasher-close'></button>
      </div>";
      unset($_SESSION['flasher']);
    }
  }

}