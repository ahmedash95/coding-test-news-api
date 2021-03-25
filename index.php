<?php

use App\Log;
use App\NewsAggregator;
use App\Repository\MyNewsRepository;
use App\Repository\FoxNewsRepository;
use App\Repository\NewYourTimesRepository;

require __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$aggregator = new NewsAggregator();

$aggregator->addNewsRepository(new FoxNewsRepository);
$aggregator->addNewsRepository(new NewYourTimesRepository);
$aggregator->addNewsRepository(new MyNewsRepository);

Log::info('Start new request to fetch news');

$news = $aggregator->get();

print_r($news);
