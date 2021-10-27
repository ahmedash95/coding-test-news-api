<?php

namespace App;

use Package\NYTimes\NewYorkTimes;

class NYNewsSource extends AbstractSource
{
    protected function createSource()
    {
        $this->newsSource = new NewYorkTimes();
    }

    public function get()
    {
        parent::get();
        foreach ($this->newsSource->getNews()->articles as $row) {
            $this->news[] = [
                'title'        => (string) $row->title,
                'author'       => (string) $row->author,
                'image'        => (string) $row->image,
                'publish_date' => (string) $row->published_at,
                'source'       => (string) $row->source,
                'url'          => (string) $row->url,
            ];
        }

        return $this->news;
    }
}