<?php


namespace Package\NYTimes;


class NewYorkTimes
{
	private $data = [];

	public function __construct()
	{
		$this->data = simplexml_load_file(__DIR__.DIRECTORY_SEPARATOR.'nytimes.xml');
	}

	public function getNews()
	{
		return $this->data;
	}
}