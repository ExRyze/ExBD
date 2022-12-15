<?php

class Animes_Studios_Table {

  private $table = 'animes_studios';
  private $origin = 'studios';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.studio_id = {$this->origin}.id ORDER BY `studio`");
    return $this->db->resultAll();
  }

  public function getAliasesBySlug($slug) {
    $this->db->query("SELECT `animes`.id, `animes`.slug, {$this->table}.*, {$this->origin}.* FROM {$this->table} INNER JOIN `animes` ON `animes`.id = {$this->table}.anime_id INNER JOIN {$this->origin} ON {$this->origin}.id = {$this->table}.studio_id  WHERE `animes`.slug = :slug ORDER BY `studio` ASC");
    $this->db->bind('slug', $slug);
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

  public function delete() {
    $this->db->query("DELETE {$this->table} FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.studio_id = {$this->origin}.id WHERE `anime_id` = :id && `studio` = :studio");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('studio', $_POST['studio']);
    return $this->db->rowCount();
  }

}