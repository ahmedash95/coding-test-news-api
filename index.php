<?php

use App\NewsAbstractFactory;

require __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

$news = new NewsAbstractFactory();

print_r(array_merge(
    $news->createFoxNewsAggregator()->getArticles(),
    $news->createNYTimesAggregator()->getArticles()
));
