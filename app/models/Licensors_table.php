<?php 

class Licensors_Table {

  private $table = 'licensors';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `licensor` = :licensor");
    $this->db->bind('licensor', $_POST['licensor']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`licensor`) VALUES (:licensor)");
    $this->db->bind('licensor', $_POST['licensor']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `licensor` = :licensor WHERE `id` = :id");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('licensor', $_POST['licensor']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `id` = :id");
    $this->db->bind('id', $_POST['id']);
    return $this->db->rowCount();
  }

}