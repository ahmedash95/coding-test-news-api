<?php

namespace App\Contract;

interface NewsRepository
{
    public function getNews(): array;

    /**
     * Get the news provider object.
     *
     * @return object|null
     */
    public function getProvider();
}
