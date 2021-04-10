<?php
namespace App\DTOs;

use ReflectionClass;
use ReflectionProperty;

final class ArticleData
{
    /** @var string */
    public string $title;

    /** @var string */
    public string $author;

    /** @var string|null */
    public ?string $image;

    /** @var string */
    public string $publishedAt;

    /** @var string|array */
    public string|array $source;

    /** @var string */
    public string $url;

    public function __construct (...$args)
    {
        if (is_array($args[0] ?? null)) {
            $args = $args[0];
        }

        $class = new ReflectionClass($this);

        foreach ($class->getProperties() as $property) {
            if (array_key_exists($property->name, $args)) {
                $property->setValue($this, $args[$property->name]);
            } else {
                $this->setOnArrayKeyMatch($property, $args);
            }
        }
    }

    public static function fromDataSource (array $data): self
    {
        return new self($data);
    }

    public static function allFromDataSource (array $data): array
    {
        return array_map(fn($article) => (array) self::fromDataSource((array) $article), $data['articles']);
    }

    private function setOnArrayKeyMatch (ReflectionProperty $property, array $args): void
    {
        foreach ($args as $key => $value) {
            if (str_contains($key, ucfirst($property->name))) {
                $property->setValue($this, $value);
            }
        }
    }
}