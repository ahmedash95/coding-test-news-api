<?php

namespace App\Repository;

use Package\MyNews\MyNews;
use App\Mapper\MyNewsMapper;
use App\Contract\NewsRepository;

class MyNewsRepository implements NewsRepository
{
    public function getProvider()
    {
        return new MyNews;
    }

    public function getNews(): array
    {
        $articles = [];

        foreach ($this->getProvider()->getNewsFromAPI()['articles'] as $article) {
            $mapper = new MyNewsMapper($article);
            $articles[] = $mapper->map();
        }

        return $articles;
    }
}
