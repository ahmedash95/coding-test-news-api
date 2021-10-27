<?php

use App\BrokenSource;
use App\FoxNewsSource;
use App\NewsAggregator;
use App\NYNewsSource;

require __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

$newsAggregator = new NewsAggregator();

$FoxNews = $newsAggregator->getNews(new FoxNewsSource());
$NYNews = $newsAggregator->getNews(new NYNewsSource());
$BrokenNews = $newsAggregator->getNews(new BrokenSource());

print_r(array_merge($FoxNews, $NYNews, $BrokenNews));