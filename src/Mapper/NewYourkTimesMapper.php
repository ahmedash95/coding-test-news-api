<?php

namespace App\Mapper;

use App\Contract\NewsMapper;
use Exception;

class NewYourkTimesMapper implements NewsMapper
{
    protected object $data;

    /**
     * Create new NewYourkTimesMapper
     *
     * @param object $data
     */
    public function __construct(object $data)
    {
        $this->data = $data;
    }

    /**
     * @inheritDoc
     */
    public function map(): array
    {
        return [
            'title'         => (string) $this->title,
            'author'        => (string) $this->author,
            'image'         => (string) $this->image,
            'publish_date'  => (string) $this->published_at,
            'source'        => (string) $this->source,
            'url'           => (string) $this->url,
        ];
    }

    public function __get($name)
    {
        if (isset($this->data->{$name})) {
            return $this->data->{$name};
        }

        throw new Exception("Property {$name} not exists.");
    }
}
