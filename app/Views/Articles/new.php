<?= $this->extend("layouts/default") ?>

<!-- Title -->
<?= $this->section("title") ?>New Article<?= $this->endSection("title") ?>

<!-- Content -->
<?= $this->section("content") ?>

<h1>New Article</h1>

<!-- Message -->
<?php if (session()->has("errors")) : ?>
    <ul>
        <?php foreach (session("errors") as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- Form -->
<?= form_open("articles/create") ?>

<label for="title">Title</label>
<input type="text" id="title" name="title">

<label for="content">Content</label>
<textarea id="content" name="content"></textarea>

<button>Save</button>

</form>

<?= $this->endSection() ?>