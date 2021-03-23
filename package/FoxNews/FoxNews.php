<?php

namespace Package\FoxNews;

class FoxNews
{
	private $data = [];

	public function __construct()
	{
		$this->data = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'foxnews.json'), true);
	}

	public function getNewsFromAPI()
	{
		return $this->data;
	}
}