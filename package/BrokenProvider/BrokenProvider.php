<?php

namespace Package\BrokenProvider;

use RuntimeException;

class BrokenProvider
{
    private $data = [];

    public function __construct()
    {
        $path = __DIR__.DIRECTORY_SEPARATOR.'broken.xml';
        if (!file_exists($path)) {
            throw new RuntimeException('File data is not found.');
        }

        $this->data = simplexml_load_file($path);
    }

    public function getNews()
    {
        return $this->data;
    }
}
