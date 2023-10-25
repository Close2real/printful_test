<?php

namespace App\src\Service\Products;

use stdClass;

interface ShopifyProductsServiceInterface
{
    public function fetchProducts(): stdClass;
}