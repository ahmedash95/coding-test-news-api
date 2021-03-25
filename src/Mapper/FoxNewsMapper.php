<?php

namespace App\Mapper;

use App\Contract\NewsMapper;

class FoxNewsMapper implements NewsMapper
{
    protected array $data;

    /**
     * Create new FoxNewsMapper
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
