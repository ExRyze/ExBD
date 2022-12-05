<?php

class Animes_table {

  private $table = 'animes';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function getAnimeById($id) {
    $this->db->query("SELECT * FROM {$this->table} WHERE `id` = :id");
    $this->db->bind('id', $id);
    return $this->db->result();
  }

  public function getAnimeBySlug($slug) {
    $this->db->query("SELECT * FROM {$this->table} WHERE `slug` = :slug");
    $this->db->bind('slug', $slug);
    return $this->db->result();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`slug`, `title`, `episodes`, `type`, `aired`, `finished`, `created_at`, `updated_at`, `id_user`) VALUES (:slug, :title, :episodes, :tipe, :aired, :finished, :created_at, :created_at, :id_user)");
    $this->db->bind('slug', str_replace(' ', '_', $_POST['title']));
    $this->db->bind('title', $_POST['title']);
    $this->db->bind('episodes', $_POST['episodes']);
    $this->db->bind('tipe', $_POST['tipe']);
    $this->db->bind('aired', $_POST['aired']);
    $this->db->bind('finished', $_POST['finished']);
    $this->db->bind('created_at', date('Y-m-d H:i:s'));
    $this->db->bind('id_user', $_POST['id_user']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `slug` = :slug, `title` = :title, `episodes` = :episodes, `type` = :tipe, `aired` = :aired, `finished` = :finished, `updated_at` = :updated_at, `id_user` = :id_user WHERE `id` = :id");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('slug', str_replace(' ', '_', $_POST['title']));
    $this->db->bind('title', $_POST['title']);
    $this->db->bind('episodes', $_POST['episodes']);
    $this->db->bind('tipe', $_POST['tipe']);
    $this->db->bind('aired', $_POST['aired']);
    $this->db->bind('finished', $_POST['finished']);
    $this->db->bind('updated_at', date('Y-m-d H:i:s'));
    $this->db->bind('id_user', $_POST['id_user']);
    return $this->db->rowCount();
  }

  public function delete($id) {
    $this->db->query("DELETE FROM {$this->table} WHERE `id` = :id");
    $this->db->bind('id', $id);
    return $this->db->rowCount();
  }

  public function count() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->rowCount();
  }

  public function countAllByType() {
    $this->db->query("SELECT `type`, COUNT(`type`) AS `index` FROM {$this->table} GROUP BY `type`");
    return $this->db->resultAll();
  }

}