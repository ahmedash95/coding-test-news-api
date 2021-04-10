<?php
namespace Package\FoxNews;

use App\ValueObjects\DataSource;

class FoxNews
{
    /** @var DataSource */
    private DataSource $dataSource;

    public function __construct()
    {
        $this->dataSource = new DataSource(__DIR__ . DIRECTORY_SEPARATOR . 'foxnews.json');
    }

    public function getNewsFromAPI()
    {
        return $this->data;
    }
}
