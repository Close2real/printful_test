<?php

namespace App\test;

use App\src\Controller\ShopifyProductsController;
use PHPUnit\Framework\TestCase;

class ShopifyProductsTest extends TestCase
{
    public function testCalculateStatistics(): void
    {
        $this->assertEquals(
            ['max' => 100.00, 'min' => 0.00, 'avg' => 32.00],
            ShopifyProductsController::calculateStatistics([30.00, 20.00, 0.00, 100.00, 10.00])
        );
    }
}