<?php

namespace App\NewsProviders;

use Package\BrokenProvider\BrokenProvider;

class BrokenSource extends AbstractSource
{
    protected function createSource()
    {
        $this->newsProvider = new BrokenProvider();
    }

    public function get()
    {
        parent::get();
        return $this->news;
    }
}