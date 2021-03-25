<?php

namespace App\Mapper;

use App\Contract\NewsMapper;

class MyNewsMapper implements NewsMapper
{
    protected array $data;

    /**
     * Create new MyNewsMapper
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @inheritDoc
     */
    public function map(): array
    {
        return [
            'title'         => $this->data['title'],
            'author'        => $this->data['author'],
            'image'         => $this->data['urlToImage'],
            'publish_date'  => $this->data['publishedAt'],
            'source'        => $this->data['source']['name'],
            'url'           => $this->data['url'],
        ];
    }
}
