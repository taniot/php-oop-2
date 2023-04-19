<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/Models/Category.php';
require_once __DIR__ . '/Models/Product.php';
require_once __DIR__ . '/Models/Food.php';

$errors = [];
$categories_model = [];
$products_model = [];



//creazione oggetti categorie
foreach ($categories_data as $key => $category) {
    $categories_model[$key] = new Category($category['name'], $category['icon']);
}

//var_dump($categories_model);


//creazioni prodotti
foreach ($products_data as $product) {
    $current_product = null;
    try {
        $product_category = Product::prepare_product_category($product['category'], $categories_model);

        var_dump($product_category);

        switch ($product['type']) {

            case 'food':

                $current_product = new Food($product['id'], $product['name'], $product['description'], $product_category, $product['price'], $product['image']);
                $current_product->set_ingredients($product['ingredients']);
                $current_product->set_expire_date($product['expire_date']);
                break;

            case 'game':

                break;

            case 'accessory':
                break;

            default:
                $current_product = new Product($product['id'], $product['name'], $product['description'], $product_category, $product['price'], $product['image']);
                break;
        }
        $products_model[] = $current_product;
    } catch (Exception $e) {
        array_push($errors, $product['id'] . ' - ' . $e->getMessage());
    }
}
