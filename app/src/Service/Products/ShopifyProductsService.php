<?php

namespace App\src\Service\Products;

use App\src\Client\Products\ShopifyProductsClient;
use App\src\Client\Products\ShopifyProductsClientInterface;
use App\src\Traits\ApiUtils;
use GuzzleHttp\Exception\GuzzleException;

class ShopifyProductsService
{
    use ApiUtils {
        ApiUtils::__construct as private __auConstruct;
    }

    private ShopifyProductsClientInterface $client;

    public function __construct()
    {
        $this->__auConstruct();
        $this->client = new ShopifyProductsClient();
    }

    public function fetchProducts(): string
    {
        try {
            return serialize($this->client->fetchProducts([
                'fields' => 'id,images,title,variants',
                'access_token' => $this->adminApiToken
            ])->getBody()->getContents());
        } catch (GuzzleException $e) {

        }
    }
}