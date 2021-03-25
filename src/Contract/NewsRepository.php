<?php

namespace App\Contract;

interface NewsRepository
{
    public function getNews(): array;
}
