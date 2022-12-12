<?php

class Animes_Videos_table {

  private $table = 'animes_videos';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `anime_id` = :id");
    $this->db->bind('id', $_POST['id']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`anime_id`, `source_videos`, `type_videos`, `resolution_videos`, `tracks_videos`) VALUES (:id, :source, :type, :resolution, :tracks)");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('source', $_POST['source']);
    $this->db->bind('type', $_POST['type']);
    $this->db->bind('resolution', $_POST['resolution']);
    $this->db->bind('tracks', $_POST['tracks']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `source_videos` = :source, `type_videos` = :type, `resolution_videos` = :resolution, `tracks_videos` = :tracks WHERE `anime_id` = :id");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('source', $_POST['source']);
    $this->db->bind('type', $_POST['type']);
    $this->db->bind('resolution', $_POST['resolution']);
    $this->db->bind('tracks', $_POST['tracks']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `anime_id` = :id");
    $this->db->bind('id', $_POST['id']);
    return $this->db->rowCount();
  }

}