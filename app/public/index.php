<?php

use App\src\Service\Products\ShopifyProductsService;

require(__DIR__ . "/../../vendor/autoload.php");

print((new ShopifyProductsService())->fetchProducts());