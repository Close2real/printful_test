<?php

namespace App\src\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

trait ApiUtils
{
    private string $adminApiToken;

    private string $apiKey = '';

    private string $apiSecretKey = '';

    private string $shopifyLink = '';

    private string $cipheringValue = "AES-128-CTR";

    private ClientInterface $httpClient;

    //This variable must be placed as file in tmp folder of Apache but we do not have access to it in this case,
    //so we will place it here
    private string $cipher = 'thhun09c2f56z086zea6hsa05f1z02';

    public function __construct() {
       $this->shopifyLink = "https://{$_ENV['SHOP']}.myshopify.com";
       $this->httpClient = new Client();
       $this->adminApiToken = openssl_decrypt($_ENV['ADMIN_API_TOKEN'], $this->cipheringValue, $this->cipher);
       $this->apiKey = openssl_decrypt($_ENV['API_KEY'], $this->cipheringValue, $this->cipher);
       $this->apiSecretKey = openssl_decrypt($_ENV['API_SECRET_KEY'], $this->cipheringValue, $this->cipher);
    }
}