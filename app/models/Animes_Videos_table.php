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
    var_dump($_POST['errors']);
    $this->db->query("INSERT INTO {$this->table} (`anime_id`, `source_videos`, `type_videos`, `resolution_videos`, `tracks_videos`, `chapters_videos`, `tracks_audios`, `subtitles_videos`, `additional_errors`, `additional_values`, `status_videos`) VALUES (:id, :source, :type, :resolution, :tracks, :chapter, :audio, :subtitle, :errors, :values, :status)");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('source', $_POST['source']);
    $this->db->bind('type', $_POST['type']);
    $this->db->bind('resolution', $_POST['resolution']);
    $this->db->bind('tracks', $_POST['tracks']);
    $this->db->bind('chapter', $_POST['chapter']);
    $this->db->bind('audio', $_POST['audio']);
    $this->db->bind('subtitle', $_POST['subtitle']);
    $this->db->bind('errors', $_POST['errors']);
    $this->db->bind('values', $_POST['values']);
    $this->db->bind('status', $_POST['status']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `source_videos` = :source, `type_videos` = :type, `resolution_videos` = :resolution, `tracks_videos` = :tracks, `chapters_videos` = :chapter, `tracks_audios` = :audio, `subtitles_videos` = :subtitle, `additional_errors` = :errors WHERE `anime_id` = :id");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('source', $_POST['source']);
    $this->db->bind('type', $_POST['type']);
    $this->db->bind('resolution', $_POST['resolution']);
    $this->db->bind('tracks', $_POST['tracks']);
    $this->db->bind('chapter', $_POST['chapter']);
    $this->db->bind('audio', $_POST['audio']);
    $this->db->bind('subtitle', $_POST['subtitle']);
    $this->db->bind('errors', $_POST['errors']);
    return $this->db->rowCount();
  }

  public function revert() {
    $this->db->query("UPDATE {$this->table} SET {$this->table}.`status_videos` = '' WHERE `anime_id` = :id");
    $this->db->bind('id', $_POST['id']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("UPDATE {$this->table} SET {$this->table}.`status_videos` = 'DELETED' WHERE `anime_id` = :id");
    $this->db->bind('id', $_POST['id']);
    return $this->db->rowCount();
  }

  public function hardDelete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `anime_id` = :id");
    $this->db->bind('id', $_POST['id']);
    return $this->db->rowCount();
  }

}