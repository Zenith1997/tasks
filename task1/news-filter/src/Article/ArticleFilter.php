<?php
declare(strict_types=1);

namespace App\Article;

class ArticleFilter
{
    public function filterAndSort(ArticleCollection $articles, string $category): ArticleCollection
    {
        return $articles
            ->filterByCategory($category)
            ->sortByNewestFirst();
    }
}
