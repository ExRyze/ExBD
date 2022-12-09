<?php

class Users_table {

  private $table = 'users';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username");
    $this->db->bind('username', $_POST['username']);
    return $this->db->rowCount();
  }

  public function authentication() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username AND `password` = :password");
    $this->db->bind('username', $_POST['username']);
    $this->db->bind('password', $_POST['password']);
    return $this->db->result();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`username`, `name`, `password`, `created_at`, `updated_at`)
    VALUES (:username, :name, :password, :date, :date)");
    $this->db->bind('username', $_POST['username']);
    $this->db->bind('name', $_POST['name']);
    $this->db->bind('password', $_POST['password']);
    $this->db->bind('date', date('Y-m-d H:i:s'));
    return $this->db->rowCount();
  }

  public function storeAdmin() {
    $this->db->query("INSERT INTO {$this->table} (`username`, `name`, `password`, `role`, `created_at`, `updated_at`)
    VALUES (:username, :name, :password, :role, :date, :date)");
    $this->db->bind('username', $_POST['username']);
    $this->db->bind('name', $_POST['name']);
    $this->db->bind('password', $_POST['password']);
    $this->db->bind('role', $_POST['role']);
    $this->db->bind('date', date('Y-m-d H:i:s'));
    return $this->db->rowCount();
  }

  public function updateStatus($id, $status) {
    $this->db->query("UPDATE {$this->table} SET `status` = :status WHERE `id` = :id");
    $this->db->bind('status', $status);
    $this->db->bind('id', $id);
    return $this->db->rowCount();
  }

  public function delete($id) {
    $this->db->query("DELETE FROM {$this->table} WHERE `id` = :id");
    $this->db->bind('id', $id);
    return $this->db->rowCount();
  }

  public function countAllByRole() {
    $this->db->query("SELECT `role` AS `role`, COUNT(*) AS `index` FROM {$this->table} GROUP BY `role`");
    return $this->db->resultAll();
  }

}