<?php
namespace App;

use Package\NYTimes\NewYorkTimes;

class NewYorkTimesApi  implements NewsPaperInterface
{
    private $newYorkTimes ;
    public function __construct(NewYorkTimes $newYorkTimes)
    {
        $this->newYorkTimes = $newYorkTimes;
    }
    public function News()
    {
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
