<?= $this->extend("layouts/default") ?>

<!-- Title -->
<?= $this->section("title")?>Article<?= $this->endSection("title")?>

<!-- Content -->
<?= $this->section("content") ?>
    <h1><?= $article["title"] ?></h1>
    <p><?= $article["content"] ?></p>
<?= $this->endSection() ?>