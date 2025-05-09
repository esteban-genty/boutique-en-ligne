<?php

namespace App\Models;

use PDO;
use App\Models\Database;

class ProductModel {
    /**
     * Récupère des produits aléatoires pour l'affichage en page d'accueil
     * 
     * @param int $limit Nombre de produits à récupérer
     * @return array Liste des produits
     */
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
    
    /**
     * Récupère tous les produits en stock
     * 
     * @return array Liste complète des produits
     */
    public static function getAllProducts() {
        $pdo = Database::connect();
        
        // Version améliorée avec LEFT JOIN pour éviter d'exclure des produits
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
            
            // DEBUG: Afficher le nombre de produits
            echo "<!-- getAllProducts: " . count($products) . " produits trouvés -->";
            
            return $products;
        } catch (\PDOException $e) {
            // Afficher une erreur en commentaire HTML pour le débogage
            echo "<!-- Erreur SQL (getAllProducts): " . htmlspecialchars($e->getMessage()) . " -->";
            return [];
        }
    }
    
    /**
     * Récupère les produits filtrés par genre
     * 
     * @param string $gender Genre des produits ('man' ou 'woman')
     * @return array Liste des produits filtrés
     */
    public static function getProductsByGender($gender) {
        $pdo = Database::connect();
        
        // Version améliorée avec LEFT JOIN et vérification des valeurs NULL
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
            
            // DEBUG: Afficher le nombre de produits et la valeur du paramètre
            echo "<!-- getProductsByGender('" . htmlspecialchars($gender) . "'): " . count($products) . " produits trouvés -->";
            
            return $products;
        } catch (\PDOException $e) {
            // Afficher une erreur en commentaire HTML pour le débogage
            echo "<!-- Erreur SQL (getProductsByGender): " . htmlspecialchars($e->getMessage()) . " -->";
            return [];
        }
    }
    
    /**
     * Fonction de diagnostic pour afficher tous les produits sans filtrage
     * Utile pour déboguer les problèmes d'affichage
     */
    public static function getAllProductsWithoutFilter() {
        $pdo = Database::connect();
        $sql = "SELECT * FROM product";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // DEBUG: Afficher le nombre total de produits dans la base
        echo "<!-- Total des produits dans la base: " . count($products) . " -->";
        
        return $products;
    }
}