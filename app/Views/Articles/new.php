<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>New Article<?= $this->endSection("title") ?>
<?= $this->section("content") ?>
<h1>New Article</h1>

<!-- ErrorsMessage -->
<?php if (session()->has("errors")) : ?>
    <ul>
        <?php foreach (session("errors") as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- Form -->
<?= form_open("articles") ?>
<?= $this->include("Articles/form") ?>
</form>

<?= $this->endSection() ?>