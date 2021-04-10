<?php
namespace Package\BrokenProvider;

use App\ValueObjects\DataSource;

class BrokenProvider
{
    /** @var DataSource */
    private DataSource $dataSource;

    public function __construct()
    {
        $this->dataSource = new DataSource(__DIR__ . DIRECTORY_SEPARATOR . 'broken.xml');
    }

    public function getNews()
    {
        return $this->data;
    }
}
