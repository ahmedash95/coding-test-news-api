<?php
namespace Package\NYTimes;

use App\Contracts\NewsAggregatorInterface;
use App\DTOs\NewsAggregatorData;
use App\ValueObjects\DataSource;

class NewYorkTimes implements NewsAggregatorInterface
{
    /** @var DataSource */
    private DataSource $dataSource;

    public function __construct()
    {
        $this->dataSource = new DataSource(__DIR__ . DIRECTORY_SEPARATOR . 'nytimes.xml');
    }

    public function fetch (): array
    {
        return NewsAggregatorData::allFromDataSource((array) simplexml_load_string($this->dataSource->contents()));
    }
}
