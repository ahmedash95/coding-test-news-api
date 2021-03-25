<?php

namespace App\Repository;

use Package\FoxNews\FoxNews;
use App\Mapper\FoxNewsMapper;
use App\Contract\NewsRepository;

class FoxNewsRepository implements NewsRepository
{
    public function getProvider()
    {
        return new FoxNews;
    }

    public function getNews(): array
    {
        $articles = [];

        foreach ($this->getProvider()->getNewsFromAPI()['articles'] as $article) {
            $mapper = new FoxNewsMapper($article);
            $articles[] = $mapper->map();
        }

        return $articles;
    }
}
