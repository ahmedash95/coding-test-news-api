<?php

namespace App\Repository;

use RuntimeException;
use Package\MyNews\MyNews;
use App\Mapper\MyNewsMapper;
use App\Contract\NewsRepository;

class MyNewsRepository implements NewsRepository
{
    public function getProvider()
    {
        try {
            return new MyNews;
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
            $mapper = new MyNewsMapper($article);
            $articles[] = $mapper->map();
        }

        return $articles;
    }
}
