<?php
namespace App\Factories;

use App\Contracts\NewsAggregatorInterface;
use Exception;
use Package\BrokenProvider\BrokenProvider;
use Package\FoxNews\FoxNews;
use Package\NYTimes\NewYorkTimes;

class NewsAggregatorFactory
{
    public static function createAggregator (string $aggregator): NewsAggregatorInterface
    {
        $newsAggregatorClient = match ($aggregator) {
            'FoxNews' => FoxNews::class,
            'NewYorkTimes' => NewYorkTimes::class,
            'BrokenProvider' => BrokenProvider::class,
            default => throw new Exception("{$aggregator}: couldn't be found" )
        };

        return new $newsAggregatorClient;
    }
}