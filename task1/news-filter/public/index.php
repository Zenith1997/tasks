<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Article\ArticleFilter;
use App\Article\ArticleCollection;

// Get category from query parameter or use default
$category = $_GET['category'] ?? 'Business';

// Load configuration
$articlesData = include __DIR__ . '/../src/config.php';

// Create ArticleCollection from config data
$articles = new ArticleCollection(...$articlesData);

// Filter and sort articles
$filter = new ArticleFilter();
$filteredArticles = $filter->filterAndSort($articles, $category);

// Render view
$title = "{$category} Articles (Newest First)";
include __DIR__ . '/../templates/article_list.php';
