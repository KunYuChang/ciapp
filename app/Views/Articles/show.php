<?= $this->extend("layouts/default") ?>

<!-- Title -->
<?= $this->section("title") ?>Article<?= $this->endSection("title") ?>

<!-- Content -->
<?= $this->section("content") ?>
<h1><?= esc($article["title"]) ?></h1>
<p><?= esc($article["content"]) ?></p>
<?= $this->endSection() ?>