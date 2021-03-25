<?php

namespace App;

use App\Log;
use RuntimeException;
use App\Contract\NewsRepository;

class NewsAggregator
{
	/**
	 * @var NewsRepository[]
	 */
	protected array $repositories = [];

	/**
	 * Create new NewsAggregator.
	 */
	public function __construct()
	{
	}

	public function addNewsRepository(NewsRepository $newsRepository)
	{
		$this->repositories[] = $newsRepository;
	}

	public function get(): array
	{
		$news = [];

		foreach ($this->repositories as $repository) {
			try {
				$articles = $repository->getNews();
			} catch (RuntimeException $e) {
				$articles = [];

				Log::setChannel("app-errors");
            	Log::error($e->getMessage(), $e->getTrace());
			}

			$news = array_merge($news, $articles);
		}

		return $news;
	}
}
