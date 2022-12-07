<?php

class Animes_Aliases_table {

  private $table = 'animes_aliases';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (``)");
  }

}