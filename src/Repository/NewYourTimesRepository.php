<?php

namespace App\Repository;

use App\Contract\NewsRepository;
use App\Mapper\NewYourkTimesMapper;
use Package\NYTimes\NewYorkTimes;

class NewYourTimesRepository implements NewsRepository
{
    protected NewYorkTimes $provider;

    public function __construct(NewYorkTimes $provider)
    {
        $this->provider = $provider;
    }

    public function getNews(): array
    {
        $articles = [];

        foreach ($this->provider->getNews()->articles as $article) {
            $mapper = new NewYourkTimesMapper($article);
            $articles[] = $mapper->map();
        }

        return $articles;
    }
}
