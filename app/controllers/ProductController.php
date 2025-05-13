<?php
namespace App\Controllers;

use App\Models\ProductModel;

class ProductController
{
    // Affiche la views pour les produits 
    public function index()
    {
        // Récupération du genre depuis l'URL (man, woman, all)
        $gender = isset($_GET['gender']) ? $_GET['gender'] : 'all';

        // Validation des genres possibles
        if (!in_array($gender, ['man', 'woman', 'all'])) {
            $gender = 'all';
        }

        // Récupération des produits en fonction du genre
        if ($gender === 'all') {
            $products = ProductModel::getAllProducts();
        } else {
            $products = ProductModel::getProductsByGender($gender);
        }

        // Définir le titre de la page en fonction du genre
        $pageTitle = ($gender === 'man') ? 'Produits Homme' :
                     (($gender === 'woman') ? 'Produits Femme' : 'Tous nos produits');

        // Définir l'image de la bannière selon le genre
        $bannerImage = '';
        switch ($gender) {
            case 'man':
                $bannerImage = './public/assets/img/Men-Collection-Banner.webp'; 
                break;
            case 'woman':
                $bannerImage = './public/assets/img/Women-Collection-Banner.webp'; 
                break;
            default:
                $bannerImage = './public/assets/img/Default-Collection-Banner.webp'; 
                break;
        }

      
        require_once __DIR__ . '/../views/ProductList.php';
    }

    public function details()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        if (!$id) {
            http_response_code(400);
            echo "Erreur : ID du produit manquant.";
            return;
        }

        $product = ProductModel::getProductById($id);

        if (!$product) {
            http_response_code(404);
            echo "Erreur : Produit non trouvé.";
            return;
        }

        $pageTitle = $product['name'];

    
        $suggestions = ProductModel::getSuggestionsByGarmentId($product['garment_id'], $product['id']);


        require_once __DIR__ . '/../views/DetailsProduct.php';
    }
}
