<?php

namespace Package\FoxNews;

use RuntimeException;

class FoxNews
{
	private $data = [];

	public function __construct()
	{
		$path = __DIR__.DIRECTORY_SEPARATOR.'foxnews.json';
		if(! file_exists($path)) {
			throw new RuntimeException("File data is not found.");
		}
		
		$content = file_get_contents($content);
		$this->data = json_decode($content, true);
	}

	public function getNewsFromAPI()
	{
		return $this->data;
	}
}