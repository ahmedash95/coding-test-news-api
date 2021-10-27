<?php

namespace App\NewsProviders;

use App\Log;

class AbstractSource implements NewsInterface
{
    protected array $news = [];
    protected object $newsProvider;

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