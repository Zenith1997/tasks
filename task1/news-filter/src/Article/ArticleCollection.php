<?php
declare(strict_types=1);

namespace App\Article;

class ArticleCollection implements \IteratorAggregate, \Countable
{
    private array $articles = [];

    public function __construct(Article ...$articles)
    {
        $this->articles = $articles;
    }

    public function add(Article $article): void
    {
        $this->articles[] = $article;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->articles);
    }

    public function count(): int
    {
        return count($this->articles);
    }

    public function filterByCategory(string $category): self
    {
        return new self(...array_filter(
            $this->articles,
            fn(Article $article) => $article->getCategory() === $category
        ));
    }

    public function sortByNewestFirst(): self
    {
        $articles = $this->articles;
        usort($articles, fn(Article $a, Article $b) => 
            $b->getPublishedDate() <=> $a->getPublishedDate()
        );
        return new self(...$articles);
    }
}
