<?php

namespace App\Repository;

use App\Contract\NewsRepository;
use App\Mapper\FoxNewsMapper;
use Package\FoxNews\FoxNews;

class FoxNewsRepository implements NewsRepository
{
    protected FoxNews $provider;

    public function __construct(FoxNews $provider)
    {
        $this->provider = $provider;
    }

    public function getNews(): array
    {
        $articles = [];

        foreach ($this->provider->getNewsFromAPI()['articles'] as $article) {
            $mapper = new FoxNewsMapper($article);
            $articles[] = $mapper->map();
        }

        return $articles;
    }
}
