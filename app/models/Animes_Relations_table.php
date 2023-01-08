<?php

class Animes_Relations_Table {

  private $table = 'animes_relations';
  private $origin = 'animes';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT {$this->table}.*, {$this->origin}.title, {$this->origin}.slug FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.relation_id = {$this->origin}.id ORDER BY {$this->table}.`relation`, {$this->origin}.title");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `anime_id` = :id && `relation` = :relation && `relation_id` = :relation_id");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('relation', $_POST['relation']);
    $this->db->bind('relation_id', $_POST['relation_id']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`anime_id`, `relation`, `relation_id`) VALUES (:id, :relation, :relation_id)");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('relation', $_POST['relation']);
    $this->db->bind('relation_id', $_POST['relation_id']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `anime_id` = :id && `relation` = :relation && `relation_id` = :relation_id");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('relation', $_POST['relation']);
    $this->db->bind('relation_id', $_POST['relation_id']);
    return $this->db->rowCount();
  }

}