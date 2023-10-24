<?php

namespace App\src\Client\Products;

use GuzzleHttp\Psr7\Response;

interface ShopifyProductsClientInterface
{
    public function fetchProducts(array $query): Response;
}