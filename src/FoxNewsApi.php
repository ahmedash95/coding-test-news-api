<?php
namespace App;

use Package\FoxNews\FoxNews;

class FoxNewsApi implements NewsPaperInterface
{
    private $foxNews ;
    public function __construct(FoxNews $foxNews)
    {
        $this->foxNews = $foxNews;
    }
    public function News()
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
        return $news;
    }
}
