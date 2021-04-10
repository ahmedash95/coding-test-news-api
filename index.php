<?php

use App\NewsAggregator;

require __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

$aggregator = new NewsAggregator('NewYorkTimes');
$news = $aggregator->get();

print_r($news);
