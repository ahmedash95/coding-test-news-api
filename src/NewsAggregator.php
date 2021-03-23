<?php


namespace App;


use Package\FoxNews\FoxNews;
use Package\NYTimes\NewYorkTimes;

class NewsAggregator
{

	private $foxNews;
	private $newYorkTimes;

	public function __construct()
	{
		$this->foxNews = new FoxNews();
		$this->newYorkTimes = new NewYorkTimes();
	}

	public function get()
	{
		$news = [];
		foreach ($this->foxNews->getNewsFromAPI()['articles'] as $row) {
			$news[] = [
				'title' => $row['title'],
				'author' => $row['author'],
				'image' => $row['urlToImage'],
				'publish_date' => $row['publishedAt'],
				'source' => $row['source']['name'],
				'url' => $row['url'],
			];
		}

		foreach ($this->newYorkTimes->getNews()->articles as $row) {
			$news[] = [
				'title' => (string) $row->title,
				'author' => (string) $row->author,
				'image' => (string) $row->image,
				'publish_date' => (string) $row->published_at,
				'source' => (string) $row->source,
				'url' => (string) $row->url,
			];
		}

		return $news;
	}
}