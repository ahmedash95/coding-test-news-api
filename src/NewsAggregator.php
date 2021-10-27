<?php

namespace App;

use App\NewsProviders\NewsInterface;

class NewsAggregator
{
    private array $newsSources = [];

    /**
     * @param NewsInterface $newsSource
     * @return mixed
     */
    public function getNews(NewsInterface $newsSource)
    {
        $this->newsSources = array_merge($this->newsSources, $newsSource->get());
    }

    public function news()
    {
        return $this->newsSources;
    }
}
