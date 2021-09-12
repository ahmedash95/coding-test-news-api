<?php


namespace App;


use Package\FoxNews\FoxNews;

class FoxNewsAggregator extends BaseNewsAggregator
{
    private array $news;
    public array $articles;

    public function __construct(FoxNews $source)
    {
        $this->news = $source->getNewsFromAPI()['articles'];
    }

	public function get() :array
	{
		foreach ($this->news as $row) {
            $this->articles[] = [
				'title' => $row['title'],
				'author' => $row['author'],
				'image' => $row['urlToImage'],
				'publish_date' => $row['publishedAt'],
				'source' => $row['source']['name'],
				'url' => $row['url'],
			];
		}

		return $this->articles;
	}
}
