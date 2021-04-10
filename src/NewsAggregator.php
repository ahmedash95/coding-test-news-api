<?php
namespace App;

use App\Contracts\NewsAggregatorInterface;
use App\Factories\NewsAggregatorFactory;

final class NewsAggregator
{
    /** @var string */
    private string $defaultAggregator = 'FoxNews';

    /** @var NewsAggregatorInterface */
    private NewsAggregatorInterface $newsAggregator;

    public function __construct(?string $aggregator = null)
    {
        $this->newsAggregator = NewsAggregatorFactory::createAggregator($aggregator ?? $this->defaultAggregator);
    }

    public function get(): array
    {
        return $this->newsAggregator->fetch();
    }
}
