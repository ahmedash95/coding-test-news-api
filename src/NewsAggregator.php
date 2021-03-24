<?php
namespace App;

use App\NewsPaperInterface;

class NewsAggregator
{
    private $newspapers = [];
    public function addNewsPaper(NewsPaperInterface $newsPapers)
    {
            $this->newspapers[] = $newsPapers;
    }
    public function get()
    {
        $news =[];
        foreach ($this->newspapers as $newsPaper) {
            $news[] = $newsPaper->News();
        }
        return $news;
    }
}
