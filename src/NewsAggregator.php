<?php

namespace App;

use Package\INewProvider;
use Package\FoxNews\FoxNews;
use Package\NYTimes\NewYorkTimes;

class NewsAggregator {

    private $providers;

    public function __construct()
    {
        $this->providers = [
            new FoxNews(),
            new NewYorkTimes()
        ];
    }

    public function get()
    {
        $news = [];
        foreach ($this->providers as $provider) {
            if($provider instanceof INewProvider) {
                $news[] = $provider->getNews();
            }
        }
        return $news;
    }
}
