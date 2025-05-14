<?php

namespace App\Models;

class ManageProducts{

    private $db;

    public function __construct()
    {
      try {
        $this->db = new \PDO('mysql:host=localhost;dbname=omni', 'root', '');
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      } catch (\PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
      }
    }

    // add product
    public function addProduct($data)
    {
        $stmt = $this->db->prepare("INSERT INTO product (name, description, price, gender_id, garment_id, color_id, size_id, stock_quantity, image) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['name'],
            $data['description'],
            $data['price'],
            $data['gender_id'],
            $data['garment_id'],
            $data['color_id'],
            $data['size_id'],
            $data['stock_quantity'],
            $data['image']
        ]);
    }

    public function selectGender()
    {
        $stmt = $this->db->query('SELECT * FROM gender');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Update product
    public function getAllProducts()
    {
        $stmt = $this->db->query('SELECT * FROM product');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}