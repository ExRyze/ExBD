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
      "<div class='".$_SESSION['flasher']['type']." card card-body'>
        <p class='m-0'>".$_SESSION['flasher']['message']."</p>
      </div>";
      unset($_SESSION['flasher']);
    }
  }

}