<?php

namespace App\src\Service\Products;

use App\src\Client\Products\ShopifyProductsClient;
use App\src\Client\Products\ShopifyProductsClientInterface;
use App\src\Traits\ApiUtils;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

class ShopifyProductsService implements ShopifyProductsServiceInterface
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

    public function fetchProducts(): stdClass
    {
        try {
            return json_decode($this->client->fetchProducts([
                'fields' => 'id,images,title,variants',
                'access_token' => $this->adminApiToken
            ])->getBody()->getContents());
        } catch (GuzzleException $e) {
            //here must be the logger class which will write our exception to logs
        }
    }
}