<?php

class Animes_Producers_Table {

  private $table = 'animes_producers';
  private $origin = 'producers';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.producer_id = {$this->origin}.id ORDER BY `producer`");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `anime_id` = :id && `producer_id` = :producer");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('producer', $_POST['producer']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`anime_id`, `producer_id`) VALUES (:id, :producer)");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('producer', $_POST['producer']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE {$this->table} FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.producer_id = {$this->origin}.id WHERE `anime_id` = :id && `producer` = :producer");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('producer', $_POST['producer']);
    return $this->db->rowCount();
  }

}