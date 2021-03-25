<?php

namespace App\Repository;

use App\Contract\NewsRepository;
use App\Mapper\NewYourkTimesMapper;
use Package\NYTimes\NewYorkTimes;
use RuntimeException;

class NewYourTimesRepository implements NewsRepository
{
    public function getProvider()
    {
        try {
            return new NewYorkTimes;
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

        foreach ($this->getProvider()->getNews()->articles as $article) {
            $mapper = new NewYourkTimesMapper($article);
            $articles[] = $mapper->map();
        }

        return $articles;
    }
}
