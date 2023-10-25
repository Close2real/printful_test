<?php

namespace App\src\Controller;

use App\src\Service\Products\ShopifyProductsService;
use App\src\Service\Products\ShopifyProductsServiceInterface;

class ShopifyProductsController
{
    private ShopifyProductsServiceInterface $service;

    public function __construct()
    {
        $this->service = new ShopifyProductsService();
    }

    public function fetchProducts()
    {
        $products = $this->service->fetchProducts();

        return json_encode($products);
    }
}