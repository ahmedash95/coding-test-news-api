<?php

namespace App;

class AbstractSource implements NewsInterface
{
    protected $news = [];
    protected $newsProvider;

    /**
     * @return mixed
     */
    public function get()
    {
        try {
            $this->createSource();
        }
        catch (\Exception $exception) {
            $logger = new Log();
            $logger->log($exception->getMessage());

            $this->news = [];
        }
    }
}