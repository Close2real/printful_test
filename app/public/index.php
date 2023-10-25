<?php

use App\src\Controller\ShopifyProductsController;

require(__DIR__ . "/../../vendor/autoload.php");

switch($_SERVER['REQUEST_URI']) {
    case '/':
        include('views/template.php');
        break;
    case '/products':
        $controller = new ShopifyProductsController();
        header("Content-type: application/json; charset=utf-8");
        echo $controller->fetchProducts();
        break;
    case '/products/statistics':
        $controller = new ShopifyProductsController();
        header("Content-type: application/json; charset=utf-8");
        echo $controller->getStatistics();
        break;
    default:
        include('views/404.php');
}
