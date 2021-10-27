<?php

namespace App;

class NewsAggregator
{
    public function getNews(NewsInterface $newsSource)
    {
        return $newsSource->get();
    }
}
