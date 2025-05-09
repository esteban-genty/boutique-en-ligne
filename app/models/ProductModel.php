<?php

namespace App\Models;

use PDO;
use App\Models\Database;

class ProductModel {
  
     
      
    public static function getRandomProducts($limit = 4) {
        $pdo = Database::connect();
        $sql = "
            SELECT id, name, price, image_url
            FROM product
            WHERE stock_quantity > 0
            ORDER BY RAND()
            LIMIT :limit
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
  
      
 
     
    public static function getAllProducts() {
        $pdo = Database::connect();
        
      
        $sql = "
            SELECT p.id, p.name, p.description, p.price, p.image_url, p.stock_quantity,
                   g.name as gender, ga.name as garment, c.name as color, s.name as size
            FROM product p
            LEFT JOIN gender g ON p.gender_id = g.id
            LEFT JOIN garment ga ON p.garment_id = ga.id
            LEFT JOIN color c ON p.color_id = c.id
            LEFT JOIN size s ON p.size_id = s.id
            WHERE p.stock_quantity > 0
        ";
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
         
            echo "<!-- getAllProducts: " . count($products) . " produits trouvés -->";
            
            return $products;
        } catch (\PDOException $e) {
         
            return [];
        }
    }

    public static function getProductsByGender($gender) {
        $pdo = Database::connect();
    
        $sql = "
            SELECT p.id, p.name, p.description, p.price, p.image_url, p.stock_quantity,
                   g.name as gender, ga.name as garment, c.name as color, s.name as size
            FROM product p
            LEFT JOIN gender g ON p.gender_id = g.id
            LEFT JOIN garment ga ON p.garment_id = ga.id
            LEFT JOIN color c ON p.color_id = c.id
            LEFT JOIN size s ON p.size_id = s.id
            WHERE LOWER(g.name) = LOWER(:gender) AND p.stock_quantity > 0
        ";
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
            echo "<!-- getProductsByGender('" . htmlspecialchars($gender) . "'): " . count($products) . " produits trouvés -->";
            
            return $products;
        } catch (\PDOException $e) {
     
            echo "<!-- Erreur SQL (getProductsByGender): " . htmlspecialchars($e->getMessage()) . " -->";
            return [];
        }
    }
    

    public static function getAllProductsWithoutFilter() {
        $pdo = Database::connect();
        $sql = "SELECT * FROM product";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<!-- Total des produits dans la base: " . count($products) . " -->";
        
        return $products;
    }
}