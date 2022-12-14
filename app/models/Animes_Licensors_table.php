<?php

class Animes_Licensors_Table {

  private $table = 'animes_licensors';
  private $origin = 'licensors';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.licensor_id = {$this->origin}.id ORDER BY `licensor`");
    return $this->db->resultAll();
  }

  public function getAliasesBySlug($slug) {
    $this->db->query("SELECT `animes`.id, `animes`.slug, {$this->table}.*, {$this->origin}.* FROM {$this->table} INNER JOIN `animes` ON `animes`.id = {$this->table}.anime_id INNER JOIN {$this->origin} ON {$this->origin}.id = {$this->table}.licensor_id  WHERE `animes`.slug = :slug ORDER BY `licensor` ASC");
    $this->db->bind('slug', $slug);
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `anime_id` = :id && `licensor_id` = :licensor");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('licensor', $_POST['licensor']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`anime_id`, `licensor_id`) VALUES (:id, :licensor)");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('licensor', $_POST['licensor']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE {$this->table} FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.licensor_id = {$this->origin}.id WHERE `anime_id` = :id && `licensor` = :licensor");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('licensor', $_POST['licensor']);
    return $this->db->rowCount();
  }

}