<?php

namespace App\Models;

use PDO;

class Product
{
  private $db;

  public function __construct()
  {
    $this->db = require 'config/bdd.php';
  }

  public function getAll()
  {
    return $this->db->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
  }

  public function findById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function create($data)
  {
    $stmt = $this->db->prepare("INSERT INTO products (name, description, price, brand, color, gender) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
      $data['name'],
      $data['description'],
      $data['price'],
      $data['brand'],
      $data['color'],
      $data['gender']
    ]);
  }

  public function update($id, $data)
  {
    $stmt = $this->db->prepare("UPDATE products SET name = ?, description = ?, price = ?, brand = ?, color = ?, gender = ? WHERE id = ?");
    $stmt->execute([
      $data['name'],
      $data['description'],
      $data['price'],
      $data['brand'],
      $data['color'],
      $data['gender'],
      $id
    ]);
  }

  public function delete($id)
  {
    $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
  }
}
