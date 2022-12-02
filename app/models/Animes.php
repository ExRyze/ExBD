<?php

class Animes {

  private $table = 'animes';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function count() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->rowCount();
  }

  public function countAllByType() {
    $this->db->query("SELECT `type`, COUNT(`type`) AS `index` FROM {$this->table} GROUP BY `type`");
    return $this->db->resultAll();
  }

}