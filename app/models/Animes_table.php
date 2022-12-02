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

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`title`, `episodes`, `type`, `aired`, `finished`, `created_at`, `updated_at`, `id_user`) VALUES (:title, :episodes, :tipe, :aired, :finished, :created_at, :created_at, :id_user)");
    $this->db->bind('title', $_POST['title']);
    $this->db->bind('episodes', $_POST['episodes']);
    $this->db->bind('tipe', $_POST['tipe']);
    $this->db->bind('aired', $_POST['aired']);
    $this->db->bind('finished', $_POST['finished']);
    $this->db->bind('created_at', date('Y-m-d H:i:s'));
    $this->db->bind('id_user', $_POST['id']);
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