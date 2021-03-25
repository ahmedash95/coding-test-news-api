<?php

namespace App\Repository;

use App\Contract\NewsRepository;
use App\Mapper\FoxNewsMapper;
use Package\FoxNews\FoxNews;
use RuntimeException;

class FoxNewsRepository implements NewsRepository
{
    public function getProvider()
    {
        try {
            return new FoxNews;
        } catch (RuntimeException $e) {
            return null;
        }
    }

    public function getNews(): array
    {
        $articles = [];

        if (!$this->getProvider()) {
            return $articles;
        }

        foreach ($this->getProvider()->getNewsFromAPI()['articles'] as $article) {
            $mapper = new FoxNewsMapper($article);
            $articles[] = $mapper->map();
        }

        return $articles;
    }
}
