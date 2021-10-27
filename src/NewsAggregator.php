<?php

namespace App;

use App\NewsProviders\NewsInterface;

class NewsAggregator
{
    /**
     * @param NewsInterface $newsSource
     * @return mixed
     */
    public function getNews(NewsInterface $newsSource)
    {
        return $newsSource->get();
    }
}
