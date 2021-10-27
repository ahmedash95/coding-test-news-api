<?php

use App\NewsAggregator;
use App\NewsProviders\BrokenSource;
use App\NewsProviders\FoxNewsSource;
use App\NewsProviders\NYNewsSource;

require __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

$newsAggregator = new NewsAggregator();

$FoxNews = $newsAggregator->getNews(new FoxNewsSource());
$NYNews = $newsAggregator->getNews(new NYNewsSource());
$BrokenNews = $newsAggregator->getNews(new BrokenSource());

print_r(array_merge($FoxNews, $NYNews, $BrokenNews));