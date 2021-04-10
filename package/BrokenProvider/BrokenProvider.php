<?php

namespace Package\BrokenProvider;

use App\Contracts\NewsAggregatorInterface;
use App\DTOs\ArticleData;
use App\ValueObjects\DataSource;

final class BrokenProvider implements NewsAggregatorInterface
{
    /** @var DataSource */
    private DataSource $dataSource;

    public function __construct()
    {
        $this->dataSource = new DataSource(__DIR__ . DIRECTORY_SEPARATOR . 'broken.xml');
    }

    public function fetch (): array
    {
        return ArticleData::allFromDataSource(json_decode($this->dataSource->contents(), true));
    }
}
