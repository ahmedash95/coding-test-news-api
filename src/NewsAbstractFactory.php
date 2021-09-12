<?php


namespace App;


class NewsAbstractFactory
{
    public function createFoxNewsAggregator() :FoxNewsAggregator
    {
        return new FoxNewsAggregator();
    }

    public function createNYTimesAggregator() :NYTimesAggregator
    {
        return new NYTimesAggregator();
    }
}