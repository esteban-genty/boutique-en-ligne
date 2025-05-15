<?php

namespace App\Controllers;

use App\Models\ManageProducts;

class ProductsController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ManageProducts();
    }


    public function show()
    {
        $genders = $this->productModel->selectGender();
        $garments = $this->productModel->selectGarment();
        $colors = $this->productModel->selectColor();
        $sizes = $this->productModel->selectSize();
    
        $this->render('manage_products', [
            'genders' => $genders,
            'garments' => $garments,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
        
    }
    


    public function addProductController()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'gender_id' => trim($_POST['gender_id']),
                'garment_id' => trim($_POST['garment_id']),
                'color_id' => trim($_POST['color_id']),
                'size_id' => trim($_POST['size_id']),
                'stock_quantity' => trim($_POST['stock_quantity']),
                'image_url' => trim($_POST['image_url']),
            ];

            var_dump($data);
            die('Formulaire bien soumis');
        }
    }

    private function render($view, $data = [])
    {
        extract($data);
        if (!defined('APP_ACCESS')) {
            define('APP_ACCESS', true);
        }        
        require_once "app/views/$view.php";
    }
}
