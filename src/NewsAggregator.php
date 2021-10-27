<?php

namespace App;

use App\NewsProviders\NewsInterface;

class NewsAggregator
{
    public function getNews(NewsInterface $newsSource)
    {
        return $newsSource->get();
    }
}
