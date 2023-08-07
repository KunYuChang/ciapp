<?= $this->extend("layouts/default") ?>

<!-- Title -->
<?= $this->section("title") ?>Home<?= $this->endSection("title") ?>

<!-- Content -->
<?= $this->section("content") ?>
<h1>Wellcome</h1>

<?php if (auth()->loggedIn()) : ?>

    <p>Hello <?= esc(auth()->user()->first_name) ?></p>

    <a href="<?= url_to("logout") ?>">Log out</a>

<?php else : ?>

    <a href="<?= url_to("login") ?>">Log in</a>

<?php endif; ?>


<?= $this->endSection() ?>