<?php 

class Studios_Table {

  private $table = 'studios';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table} ORDER BY `studio`");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `studio` = :studio");
    $this->db->bind('studio', $_POST['studio']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`studio`) VALUES (:studio)");
    $this->db->bind('studio', $_POST['studio']);
    return $this->db->rowCount();
  }
  
  public function storeLinked() {
    $studio = $_POST['studio'];
    $this->db->query("INSERT INTO {$this->table} (`studio`) VALUES (:studio)");
    $this->db->bind('studio', $studio);
    $this->db->execute();
    $this->db->query("INSERT INTO `animes_studios` (`anime_id`, `studio_id`) VALUES (:id, (SELECT `id` FROM {$this->table} WHERE `studio` = :studio))");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('studio', $studio);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `studio` = :studio WHERE `id` = :id");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('studio', $_POST['studio']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `id` = :id");
    $this->db->bind('id', $_POST['id']);
    return $this->db->rowCount();
  }

}