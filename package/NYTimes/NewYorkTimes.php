<?php


namespace Package\NYTimes;

use RuntimeException;

class NewYorkTimes
{
	private $data = [];

	public function __construct()
	{
		$path = __DIR__.DIRECTORY_SEPARATOR.'nytimes.xml';
        if (! file_exists($path)) {
            throw new RuntimeException("File data is not found.");
        }

		$this->data = simplexml_load_file($path);
	}

	public function getNews()
	{
		return $this->data;
	}
}