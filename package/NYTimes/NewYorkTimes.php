<?php
namespace Package\NYTimes;

use App\ValueObjects\DataSource;

class NewYorkTimes
{
    /** @var DataSource */
    private DataSource $dataSource;

    public function __construct()
    {
        $this->dataSource = new DataSource(__DIR__ . DIRECTORY_SEPARATOR . 'nytimes.xml');
    }

    public function getNews()
    {
        return $this->data;
    }
}
