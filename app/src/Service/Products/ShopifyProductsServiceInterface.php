<?php

namespace App\src\Service\Products;

interface ShopifyProductsServiceInterface
{
    public function fetchProducts(): string;
}