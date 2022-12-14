<?php 

class Animes_Genres_Table {

  private $table = 'animes_genres';
  private $origin = 'genres';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT anime_id, genre FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.genre_id = {$this->origin}.id ORDER BY `genre`");
    return $this->db->resultAll();
  }

  public function getAliasesBySlug($slug) {
    $this->db->query("SELECT `animes`.id, `animes`.slug, {$this->table}.*, {$this->origin}.* FROM {$this->table} INNER JOIN `animes` ON `animes`.id = {$this->table}.anime_id INNER JOIN {$this->origin} ON {$this->origin}.id = {$this->table}.genre_id  WHERE `animes`.slug = :slug ORDER BY `genre` ASC");
    $this->db->bind('slug', $slug);
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `anime_id` = :id && `genre_id` = :genre");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('genre', $_POST['genre']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`anime_id`, `genre_id`) VALUES (:id, :genre)");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('genre', $_POST['genre']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE {$this->table} FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.genre_id = {$this->origin}.id WHERE `anime_id` = :id && `genre` = :genre");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('genre', $_POST['genre']);
    return $this->db->rowCount();
  }

}