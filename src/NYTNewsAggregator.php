<?php


namespace App;


use Package\NYTimes\NewYorkTimes;

class NYTNewsAggregator extends BaseNewsAggregator
{
	private $news;
	private array $articles;

	public function __construct(NewYorkTimes $source)
	{
		$this->news = $source->getNews()->articles;
	}

	public function get() :array
	{
		foreach ($this->news as $row) {
			$this->articles[] = [
				'title' => (string) $row->title,
				'author' => (string) $row->author,
				'image' => (string) $row->image,
				'publish_date' => (string) $row->published_at,
				'source' => (string) $row->source,
				'url' => (string) $row->url,
			];
		}

		return $this->articles;
	}
}
