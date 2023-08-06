<?= $this->extend("layouts/default") ?>

<!-- Title -->
<?= $this->section("title") ?>New Article<?= $this->endSection("title") ?>

<!-- Content -->
<?= $this->section("content") ?>

<h1>New Article</h1>

<!-- Form -->
<?= form_open("articles/create") ?>
<label for="title">Title</label>
<input type="text" id="title" name="title">
<label for="content">Content</label>
<input type="text" id="content" name="content">
<button>Save</button>
<?= form_close() ?>

<?= $this->endSection() ?>