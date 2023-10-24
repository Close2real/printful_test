<?php

namespace App\src\Client\Products;

use App\src\Traits\ApiUtils;
use GuzzleHttp\Psr7\Response;

class ShopifyProductsClient implements ShopifyProductsClientInterface
{
    use ApiUtils;

    public function fetchProducts(array $query): Response {
        return $this->httpClient->request('GET', $this->shopifyLink."/admin/api/2023-10/products.json", [
            'query' => $query
        ]);
    }
}