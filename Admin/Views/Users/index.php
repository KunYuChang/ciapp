<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Users<?= $this->endSection("title") ?>
<?= $this->section("content") ?>

<h1>Users</h1>

<table>
    <thead>
        <tr>
            <th>email</th>
            <th>First Name</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <th><?= esc($user->email) ?></th>
                <th><?= esc($user->first_name) ?></th>
                <th><?= $user->active ?></th>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?= $this->endSection() ?>