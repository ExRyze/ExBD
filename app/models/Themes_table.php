<?php 

class Themes_Table {

  private $table = 'themes';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table} ORDER BY `theme`");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `theme` = :theme");
    $this->db->bind('theme', $_POST['theme']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`theme`) VALUES (:theme)");
    $this->db->bind('theme', $_POST['theme']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `theme` = :theme WHERE `id` = :id");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('theme', $_POST['theme']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `id` = :id");
    $this->db->bind('id', $_POST['id']);
    return $this->db->rowCount();
  }

}