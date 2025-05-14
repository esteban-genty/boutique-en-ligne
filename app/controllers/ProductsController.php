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
    
        $this->render('manage_products', [
            'genders' => $genders
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


            $this->productModel->addProduct($data);
            header('Location: /boutique-en-ligne/manage_products');
            exit;
        }
    }


    private function render($view, $data = [])
    {
        extract($data);
        define('APP_ACCESS', true);
        require_once "app/views/$view.php";
    }
}
