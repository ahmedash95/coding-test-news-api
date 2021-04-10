<?php
namespace App\ValueObjects;

use RuntimeException;

final class DataSource
{
    private string $source;

    public function __construct (string $source)
    {
        if (! file_exists($source)) {
            throw new RuntimeException('failed to load data source.');
        }

        $this->source = $source;
    }

    public function contents (): string
    {
        return file_get_contents($this->source);
    }
}