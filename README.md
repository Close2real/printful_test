Test application based on Php 8, phpunit and guzzle only.
Using shopify api for data request

1. Clone this repository

2. Inside repository folder(printful_test) run command

```bash
docker-compose run --rm php composer install
```

After it is done run
```bash
docker-compose up
```

Your local development server will be on [localhost](http://127.0.0.1:8000/)(http://127.0.0.1:8000/)

If you want to try and test please run command
```bash
docker-compose exec php php ./vendor/bin/phpunit App/test/ShopifyProductsTest.php
```

Button which will fetch the products also store data in json file inside data folder in app root folder.

Get statistics button will show you the statistics on fetched data.

For changing Storage type you can use StorageInterface.
