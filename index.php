<?php

use App\FoxNewsAggregator;
use App\NYTNewsAggregator;
use Package\FoxNews\FoxNews;
use Package\NYTimes\NewYorkTimes;

require __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

$aggregatorFox = new FoxNewsAggregator(new FoxNews());
$aggregatorNYT = new NYTNewsAggregator(new NewYorkTimes());

print_r(array_merge(
    $aggregatorFox->get(),
    $aggregatorNYT->get()
));