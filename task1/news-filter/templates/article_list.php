<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <style>
        .article { margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; }
        .article-title { font-size: 1.2em; font-weight: bold; }
    </style>
</head>
<body>
    <h1><?= htmlspecialchars($title) ?></h1>
    
    <?php if (count($articles) === 0): ?>
        <p>No articles found in this category.</p>
    <?php else: ?>
        <div class="article-list">
            <?php foreach ($articles as $article): ?>
                <div class="article">
                    <div class="article-title"><?= htmlspecialchars($article->getTitle()) ?></div>
                    <div class="article-category">Category: <?= htmlspecialchars($article->getCategory()) ?></div>
                    <div class="article-date">Published: <?= $article->getPublishedDate()->format('Y-m-d') ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>
</html>
