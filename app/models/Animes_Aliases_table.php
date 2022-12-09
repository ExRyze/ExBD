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
    $this->db->query("INSERT INTO {$this->table} (`anime_id`, `origin_alias`, `anime_alias`) VALUES (:id, :origin, :alias)");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('origin', $_POST['origin']);
    $this->db->bind('alias', $_POST['alias']);
    return $this->db->rowCount();
  }

}