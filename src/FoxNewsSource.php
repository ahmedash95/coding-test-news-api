<?php

namespace App;

use Package\FoxNews\FoxNews;

class FoxNewsSource extends AbstractSource
{
    protected function createSource()
    {
        $this->newsProvider = new FoxNews();
    }

    public function get()
    {
        parent::get();
        foreach ($this->newsProvider->getNewsFromAPI()['articles'] as $row) {
            $this->news[] = [
                'title'        => $row['title'],
                'author'       => $row['author'],
                'image'        => $row['urlToImage'],
                'publish_date' => $row['publishedAt'],
                'source'       => $row['source']['name'],
                'url'          => $row['url'],
            ];
        }

        return $this->news;
    }
}