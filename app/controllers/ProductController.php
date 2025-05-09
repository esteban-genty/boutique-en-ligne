<?php
namespace App\Controllers;

use App\Models\ProductModel;

class ProductController
{
    public function index()
    {
   
        $gender = isset($_GET['gender']) ? $_GET['gender'] : 'all';
        
        // Valider  paramètre
        if (!in_array($gender, ['man', 'woman', 'all'])) {
            $gender = 'all';
        }
        
     
        if ($gender === 'all') {
            $products = ProductModel::getAllProducts();
        } else {
            $products = ProductModel::getProductsByGender($gender);
        }
        
  
        
       
        $pageTitle = ($gender === 'man') ? 'Produits Homme' : 
                     (($gender === 'woman') ? 'Produits Femme' : 'Tous nos produits');
        
        
        require_once __DIR__ . '/../views/ProductList.php';
    }
}