<?php

namespace App\src\Storage;

class Storage implements StorageInterface
{
    public function setData(string $key, string $data): bool
    {
        $file_path = '../data/';

        if (!file_exists($file_path)) {
            mkdir($file_path, 0777, true);
        }

        return file_put_contents($file_path.$key.'.json', $data);
    }

    public function getData(string $key): string
    {
        $file_path = '../data/'.$key.'.json';

        if (file_get_contents($file_path) === false) {
            return '';
        }

        return file_get_contents($file_path);
    }
}