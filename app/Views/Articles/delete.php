<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Edit Article<?= $this->endSection("title") ?>

<?= $this->section("content") ?>

<h1>Delet Article</h1>

<p>Are you sure?</p>

<?= form_open("articles/delete/" . $article->id) ?>

<input type="hidden" name="_method" value="delete">

<button>Yes</button>

</form>

<?= $this->endSection() ?>