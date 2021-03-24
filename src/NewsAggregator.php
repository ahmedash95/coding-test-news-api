<?php
namespace App;

use App\FoxNewsApi;
use App\NewYorkTimesApi;
class NewsAggregator
{
    private $foxNews;
    private $newYorkTimes;

    public function __construct(FoxNewsApi $foxNewsApi ,NewYorkTimesApi $newYorkTimesApi )
    {
        $this->foxNews = $foxNewsApi;
        $this->newYorkTimes = $newYorkTimesApi;
    }

    public function get()
    {
		$news =[];
		$news[] = $this->foxNews->News();
		$news = $this->newYorkTimes->News();
		return $news;
       
    }
}
