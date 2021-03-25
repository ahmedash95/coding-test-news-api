<?php

namespace App\Repository;

use RuntimeException;
use Package\MyNews\MyNews;
use App\Mapper\MyNewsMapper;
use App\Contract\NewsRepository;
use App\Log;

class MyNewsRepository implements NewsRepository
{
    public function getProvider()
    {
        return new MyNews;
    }

    public function getNews(): array
    {
        $articles = [];

        try {
            Log::info('Start new request to fetch news');
            foreach ($this->getProvider()->getNewsFromAPI()['articles'] as $article) {
                $mapper = new MyNewsMapper($article);
                $articles[] = $mapper->map();
            }
        } catch (RuntimeException $e) {
            Log::setChannel("app-errors");
            Log::error($e->getMessage(), $e->getTrace());
        }

        return $articles;
    }
}
