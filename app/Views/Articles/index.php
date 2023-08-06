<?= $this->extend("layouts/default") ?>

<!-- Title -->
<?= $this->section("title") ?>Articles<?= $this->endSection("title") ?>

<!-- Content -->
<?= $this->section("content") ?>
<h1>Articles</h1>

<a href="<?= url_to("Articles::new") ?>">New</a>

<?php foreach ($articles as $article) : ?>
    <article>
        <h2><a href="<?= site_url('/articles/' . $article['id']) ?>"><?= $article["title"] ?></a></h2>
        <p><?= $article["content"] ?></p>
    </article>
<?php endforeach; ?>

<?= $this->endSection() ?>