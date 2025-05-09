<?php
namespace App\Controllers;

use App\Models\ProductModel;

class ProductController
{
    public function index()
    {
        // Récupérer le paramètre gender
        $gender = isset($_GET['gender']) ? $_GET['gender'] : 'all';
        
        // Valider le paramètre
        if (!in_array($gender, ['man', 'woman', 'all'])) {
            $gender = 'all';
        }
        
        // Récupérer les produits en fonction du genre
        if ($gender === 'all') {
            $products = ProductModel::getAllProducts();
        } else {
            $products = ProductModel::getProductsByGender($gender);
        }
        
        // DEBUG: Afficher le nombre de produits récupérés
        echo "<!-- Nombre de produits récupérés: " . count($products) . " -->";
        
        // Définir le titre de la page
        $pageTitle = ($gender === 'man') ? 'Produits Homme' : 
                     (($gender === 'woman') ? 'Produits Femme' : 'Tous nos produits');
        
        // Afficher la vue
        require_once __DIR__ . '/../views/ProductList.php';
    }
}