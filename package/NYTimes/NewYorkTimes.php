<?php

namespace Package\NYTimes;

use Package\INewProvider;
use RuntimeException;

class NewYorkTimes implements INewProvider
{
    private $data = [];

    public function __construct()
    {
        $path = __DIR__.DIRECTORY_SEPARATOR.'nytimes.xml';
        if (!file_exists($path)) {
            throw new RuntimeException('File data is not found.');
        }

        $this->data = simplexml_load_file($path);
    }

    public function getNews() {
        
        foreach ($this->data->articles as $row) {
            $news[] = [
                'title'        => (string) $row->title,
                'author'       => (string) $row->author,
                'image'        => (string) $row->image,
                'publish_date' => (string) $row->published_at,
                'source'       => (string) $row->source,
                'url'          => (string) $row->url,
            ];
        }
        return $news;
    }
}
