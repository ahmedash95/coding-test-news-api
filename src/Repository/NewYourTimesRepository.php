<?php

namespace App\Repository;

use App\Log;
use RuntimeException;
use App\Contract\NewsRepository;
use Package\NYTimes\NewYorkTimes;
use App\Mapper\NewYourkTimesMapper;

class NewYourTimesRepository implements NewsRepository
{
    public function getProvider()
    {
        return new NewYorkTimes;
    }

    public function getNews(): array
    {
        $articles = [];

        foreach ($this->getProvider()->getNews()->articles as $article) {
            $mapper = new NewYourkTimesMapper($article);
            $articles[] = $mapper->map();
        }

        return $articles;
    }
}
