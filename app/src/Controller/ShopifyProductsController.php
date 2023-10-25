<?php

namespace App\src\Controller;

use App\src\Service\Products\ShopifyProductsService;
use App\src\Service\Products\ShopifyProductsServiceInterface;
use App\src\Storage\Storage;
use App\src\Traits\CalculationUtils;
use Fiber;
use stdClass;

class ShopifyProductsController
{
    use CalculationUtils;

    private ShopifyProductsServiceInterface $service;

    public function __construct()
    {
        $this->service = new ShopifyProductsService();
    }

    public function fetchProducts(): string
    {
        $products = $this->service->fetchProducts();

        $encodedProducts = json_encode($products);

        $fiber = new Fiber(function() use ($encodedProducts): void  {
            $storage = new Storage();
            $storage->setData('products', $encodedProducts);
        });
        $fiber->start();

        return $encodedProducts;
    }

    public function getStatistics(): string
    {
        $products = $this->service->fetchProducts();
        $prices = [];

        foreach ($products->products as $val) {
            foreach($val->variants as $var) {
                $prices[] = $var->price;
            }
        }

        $statistics = self::calculateStatistics($prices);

        return json_encode($statistics);
    }
}