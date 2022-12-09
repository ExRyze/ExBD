<?php 

class Animes_Genres_Table {

  private $table = 'animes_genres';
  private $origin = 'genres';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT anime_id, genre FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON animes_genres.genre_id = genres.id");
    return $this->db->resultAll();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`anime_id`, `genre_id`) VALUES (:id, :genre)");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('genre', $_POST['genre']);
    return $this->db->rowCount();
  }

}