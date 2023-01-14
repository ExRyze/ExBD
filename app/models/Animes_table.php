<?php

class Animes_table {

  private $table = 'animes';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }
  
  public function getTitle() {
    $this->db->query("SELECT id, title FROM {$this->table} ORDER BY `title` ASC");
    return $this->db->resultAll();
  }

  public function getAll() {
    $this->db->query("SELECT {$this->table}.*, `users`.`username` FROM {$this->table}, `users` WHERE {$this->table}.`id_user` = `users`.`id` ORDER BY `title` ASC");
    return $this->db->resultAll();
  }

  public function getNewAddedLimit($num) {
    $this->db->query("SELECT * FROM {$this->table} WHERE `type` = 'BD' OR `type` = 'TV'  OR `type` = 'Movie' ORDER BY `created_at` DESC LIMIT :num");
    $this->db->bind('num', $num);
    return $this->db->resultAll();
  }
  
  public function getVideo($slug) {
    $this->db->query("SELECT {$this->table}_Videos.*, {$this->table}.id, {$this->table}.title, {$this->table}.slug, {$this->table}.type FROM {$this->table} RIGHT OUTER JOIN {$this->table}_Videos ON {$this->table}.id = {$this->table}_Videos.anime_id WHERE `slug` = :slug");
    $this->db->bind('slug', $slug);
    return $this->db->result();
  }

  public function getVideos() {
    $this->db->query("SELECT {$this->table}_videos.*, {$this->table}.id, {$this->table}.title, {$this->table}.episodes, {$this->table}.type FROM {$this->table} RIGHT OUTER JOIN {$this->table}_videos ON {$this->table}.id = {$this->table}_videos.anime_id WHERE {$this->table}_videos.`status_videos` != 'DELETED' ORDER BY `title` ASC");
    return $this->db->resultAll();
  }
  
  public function getVideosHistory() {
    $this->db->query("SELECT {$this->table}_videos.*, {$this->table}.id, {$this->table}.title, {$this->table}.episodes, {$this->table}.type FROM {$this->table} RIGHT OUTER JOIN {$this->table}_videos ON {$this->table}.id = {$this->table}_videos.anime_id WHERE {$this->table}_videos.`status_videos` = 'DELETED' ORDER BY `title` ASC");
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

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `title` = :title");
    $this->db->bind('title', $_POST['title']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`slug`, `title`, `episodes`, `type`, `status`, `aired`, `finished`, `created_at`, `updated_at`, `id_user`) VALUES (:slug, :title, :episodes, :tipe, :status, :aired, :finished, :created_at, :created_at, :id_user)");
    $this->db->bind('slug', str_replace(' ', '_', str_replace('?', '@', str_replace(':', '-', $_POST['title']))));
    $this->db->bind('title', $_POST['title']);
    $this->db->bind('episodes', $_POST['episodes']);
    $this->db->bind('tipe', $_POST['tipe']);
    $this->db->bind('status', $_POST['status']);
    $this->db->bind('aired', $_POST['aired']);
    $this->db->bind('finished', $_POST['finished']);
    $this->db->bind('created_at', date('Y-m-d H:i:s'));
    $this->db->bind('id_user', $_POST['id_user']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `slug` = :slug, `title` = :title, `episodes` = :episodes, `type` = :tipe, `status` = :status, `aired` = :aired, `finished` = :finished, `updated_at` = :updated_at, `id_user` = :id_user WHERE `id` = :id");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('slug', str_replace(' ', '_', str_replace('?', '@', str_replace(':', '-', $_POST['title']))));
    $this->db->bind('title', $_POST['title']);
    $this->db->bind('episodes', $_POST['episodes']);
    $this->db->bind('tipe', $_POST['tipe']);
    $this->db->bind('status', $_POST['status']);
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