<?php

use App\NewsAggregator;
use App\Repository\FoxNewsRepository;
use App\Repository\NewYourTimesRepository;
use Package\FoxNews\FoxNews;
use Package\NYTimes\NewYorkTimes;

require __DIR__.DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";

$aggregator = new NewsAggregator();

$aggregator->addNewsRepository(new FoxNewsRepository(new FoxNews));
$aggregator->addNewsRepository(new NewYourTimesRepository(new NewYorkTimes));

$news = $aggregator->get();

print_r($news);