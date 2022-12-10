<?php

class Animes_Studios_Table {

  private $table = 'animes_studios';
  private $origin = 'studios';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.studio_id = {$this->origin}.id");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `anime_id` = :id && `studio_id` = :studio");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('studio', $_POST['studio']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`anime_id`, `studio_id`) VALUES (:id, :studio)");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('studio', $_POST['studio']);
    return $this->db->rowCount();
  }

}