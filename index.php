<?php
use Package\FoxNews\FoxNews;
use Package\NYTimes\NewYorkTimes;
use App\NewsAggregator;
use App\FoxNewsApi;
use App\NewYorkTimesApi;
require __DIR__.DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";
$foxNews= new FoxNews();
$foxNewsApi = new FoxNewsApi($foxNews);

$newYorkTimes = new NewYorkTimes();
$newYorkTimesApi = new NewYorkTimesApi($newYorkTimes);
$aggregator = new NewsAggregator($foxNewsApi,$newYorkTimesApi);
$news = $aggregator->get();

print_r($news);