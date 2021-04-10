<?php
namespace Package\FoxNews;

use App\Contracts\NewsAggregatorInterface;
use App\DTOs\NewsAggregatorData;
use App\ValueObjects\DataSource;

class FoxNews implements NewsAggregatorInterface
{
    /** @var DataSource */
    private DataSource $dataSource;

    public function __construct()
    {
        $this->dataSource = new DataSource(__DIR__ . DIRECTORY_SEPARATOR . 'foxnews.json');
    }

    public function fetch (): array
    {
        return NewsAggregatorData::allFromDataSource(json_decode($this->dataSource->contents(), true));
    }
}
