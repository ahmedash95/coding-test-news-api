<?php
namespace App\Contracts;

interface NewsAggregatorInterface
{
    public function fetch (): array;
}