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

    public function fetchProducts(): string
    {
        $products = $this->service->fetchProducts();

        return json_encode($products);
    }

    public function getStatistics()
    {
        $products = $this->service->fetchProducts();
        $sum = 0;
        $count = 0;

        foreach ($products->products as $val) {
            foreach($val->variants as $var) {
                if (!isset($max)) {
                    $max = $var->price;
                }

                if (!isset($min)) {
                    $min = $var->price;
                }

                if ($var->price > $max) {
                    $max = $var->price;
                }

                if ($var->price < $min) {
                    $min = $var->price;
                }

                $sum += $var->price;
                $count++;
            }
        }

        $avg = number_format((float)$sum/$count, 2, '.', '');;

        return json_encode(['max' => $max, 'min' => $min, 'avg' => $avg]);
    }
}