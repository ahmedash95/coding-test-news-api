<?php

namespace Package\BrokenProvider;

use App\Contracts\NewsAggregatorInterface;
use App\DTOs\NewsAggregatorData;
use App\ValueObjects\DataSource;

class BrokenProvider implements NewsAggregatorInterface
{
    /** @var DataSource */
    private DataSource $dataSource;

    public function __construct()
    {
        $this->dataSource = new DataSource(__DIR__ . DIRECTORY_SEPARATOR . 'broken.xml');
    }

    public function fetch (): array
    {
        return NewsAggregatorData::allFromDataSource(json_decode($this->dataSource->contents(), true));
    }
}
