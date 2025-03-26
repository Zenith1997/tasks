<?php
declare(strict_types=1);

namespace App\Article;

class Article
{
    public function __construct(
        private string $title,
        private string $category,
        private \DateTimeImmutable $publishedDate
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getPublishedDate(): \DateTimeImmutable
    {
        return $this->publishedDate;
    }
}
