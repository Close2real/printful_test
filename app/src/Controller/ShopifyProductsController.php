<?php

namespace App\src\Controller;

use App\src\Service\Products\ShopifyProductsService;
use App\src\Service\Products\ShopifyProductsServiceInterface;
use App\src\Storage\Storage;
use Fiber;

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

        if (!isset($max)) {
            $max = 0;
        }

        if (!isset($min)) {
            $min = 0;
        }

        $avg = number_format((float)$sum/$count, 2, '.', '');;

        return json_encode(['max' => $max, 'min' => $min, 'avg' => $avg]);
    }
}