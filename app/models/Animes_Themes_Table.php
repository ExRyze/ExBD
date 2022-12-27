<?php 

class Animes_Themes_Table {

  private $table = 'animes_themes';
  private $origin = 'themes';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT anime_id, theme FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.theme_id = {$this->origin}.id ORDER BY `theme`");
    return $this->db->resultAll();
  }

  public function getAliasesBySlug($slug) {
    $this->db->query("SELECT `animes`.id, `animes`.slug, {$this->table}.*, {$this->origin}.* FROM {$this->table} INNER JOIN `animes` ON `animes`.id = {$this->table}.anime_id INNER JOIN {$this->origin} ON {$this->origin}.id = {$this->table}.theme_id  WHERE `animes`.slug = :slug ORDER BY `theme` ASC");
    $this->db->bind('slug', $slug);
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `anime_id` = :id && `theme_id` = :theme");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('theme', $_POST['theme']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`anime_id`, `theme_id`) VALUES (:id, :theme)");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('theme', $_POST['theme']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE {$this->table} FROM {$this->table} LEFT OUTER JOIN {$this->origin} ON {$this->table}.theme_id = {$this->origin}.id WHERE `anime_id` = :id && `theme` = :theme");
    $this->db->bind('id', $_POST['id']);
    $this->db->bind('theme', $_POST['theme']);
    return $this->db->rowCount();
  }

}