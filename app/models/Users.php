<?php

class Users {

  private $table = 'users';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function authentication($post) {
    $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username AND `password` = :password");
    $this->db->bind('username', $post['username']);
    $this->db->bind('password', $post['password']);
    return $this->db->result();
  }

  public function store($post) {
    $this->db->query("INSERT INTO {$this->table} (`username`, `name`, `password`, `created_at`, `updated_at`)
    VALUES (:username, :name, :password, :date, :date)");
    $this->db->bind('username', $post['username']);
    $this->db->bind('name', $post['name']);
    $this->db->bind('password', $post['password']);
    $this->db->bind('date', date('Y-m-d H:i:s'));
    return $this->db->rowCount();
  }

}