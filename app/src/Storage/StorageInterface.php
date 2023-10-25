<?php

namespace App\src\Storage;

interface StorageInterface
{
    public function setData(string $key, string $data): bool;

    public function getData(string $key): string;
}