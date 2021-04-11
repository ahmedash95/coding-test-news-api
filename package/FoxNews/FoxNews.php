<?php

namespace Package\FoxNews;

use Package\INewProvider;
use RuntimeException;

class FoxNews implements INewProvider
{
    private $data = [];

    public function __construct()
    {
        $path = __DIR__.DIRECTORY_SEPARATOR.'foxnews.json';
        if (!file_exists($path)) {
            throw new RuntimeException('File data is not found.');
        }

        $this->data = json_decode(file_get_contents($path), true);
    }

    public function getNews() {
        
        foreach ($this->data['articles'] as $row) {
            $news[] = [
                'title'        => $row['title'],
                'author'       => $row['author'],
                'image'        => $row['urlToImage'],
                'publish_date' => $row['publishedAt'],
                'source'       => $row['source']['name'],
                'url'          => $row['url'],
            ];
        }
        return $news;
    }
}
