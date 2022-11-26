<?php

class Animes {

  private $table = 'animes';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function count() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->rowCount();
  }

}