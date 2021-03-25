<?php

namespace App\Repository;

use App\Log;
use RuntimeException;
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

        try {
            Log::info('Start new request to fetch news');
            foreach ($this->getProvider()->getNewsFromAPI()['articles'] as $article) {
                $mapper = new FoxNewsMapper($article);
                $articles[] = $mapper->map();
            }
        } catch (RuntimeException $e) {
            Log::setChannel("app-errors");
            Log::error($e->getMessage(), $e->getTrace());
        }

        return $articles;
    }
}
