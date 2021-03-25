<?php

namespace App;

use App\Contract\NewsRepository;

class NewsAggregator
{
	/**
	 * @var NewsRepository[]
	 */
	protected array $repositories = [];

	/**
	 * Create new NewsAggregator.
	 * 
	 * @param ?NewsRepository $newsRepository
	 */
	public function __construct(?NewsRepository $newsRepository = null)
	{
		if (!is_null($newsRepository)) {
			$this->repositories[] = $newsRepository;
		}
	}

	public function addNewsRepository(NewsRepository $newsRepository)
	{
		$this->repositories[] = $newsRepository;
	}

	public function get(): array
	{
		$news = [];

		foreach ($this->repositories as $repository) {
			$news = array_merge($news, $repository->getNews());
		}

		return $news;
	}
}
