<?php

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=omni;charset=utf8', 'root', 'root');
  }

  public function findByEmail($email)
  {
    $stmt = $this->db->prepare('SELECT * FROM account WHERE email = :email');
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
