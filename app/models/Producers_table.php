<?php 

class Producers_Table {

  private $table = 'producers';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `producer` = :producer");
    $this->db->bind('producer', $_POST['producer']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`producer`) VALUES (:producer)");
    $this->db->bind('producer', $_POST['producer']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `producer` = :producer WHERE `id` = :id");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('producer', $_POST['producer']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `id` = :id");
    $this->db->bind('id', $_POST['id']);
    return $this->db->rowCount();
  }

}