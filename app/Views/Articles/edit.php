<?= $this->extend("layouts/default") ?>

<!-- Title -->
<?= $this->section("title") ?>Edit Article<?= $this->endSection("title") ?>

<!-- Content -->
<?= $this->section("content") ?>

<h1>Edit Article</h1>

<!-- Message -->
<?php if (session()->has("errors")) : ?>
    <ul>
        <?php foreach (session("errors") as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- Form -->
<?= form_open("articles/" . $article->id) ?>

<input type="hidden" name="_method" value="patch">

<?= $this->include("Articles/form") ?>

</form>

<?= $this->endSection() ?>