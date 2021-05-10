<?php


namespace App;


use Package\FoxNews\FoxNews;
use Package\NYTimes\NewYorkTimes;

class NYTimesAggregator implements NewsInterface
{
    protected NewYorkTimes $news;
    protected array $articles;

    public function __construct()
    {
        $this->news = new NewYorkTimes();
    }

    public function getArticles() :array
    {
        foreach ($this->news->getNews()->articles as $row) {
            $this->articles[] = [
                'title'        => (string) $row->title,
                'author'       => (string) $row->author,
                'image'        => (string) $row->image,
                'publish_date' => (string) $row->published_at,
                'source'       => (string) $row->source,
                'url'          => (string) $row->url,
            ];
        }

        return $this->articles;
    }
}