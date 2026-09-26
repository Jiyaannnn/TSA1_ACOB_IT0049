<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<!-- This page receives MySQL records from Users::index() in the controller. -->

<section class="page-heading page-heading-row">
    <div><span class="eyebrow">Ledger / Users</span><h1>User accounts</h1><p>Staff identity records retrieved from the MySQL user ledger.</p></div>
    <span class="record-count"><?= count($users) ?> accounts</span>
</section>

<section class="table-card">
    <div class="table-wrap">
        <table>
            <thead><tr><th>Username</th><th>Full name</th><th>Date created</th></tr></thead>
            <tbody>
            <?php // The loop turns each user record into one visible table row. ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td data-label="Username"><code>@<?= esc($user['username']) ?></code></td>
                    <td data-label="Full name"><span class="table-person"><span class="mini-avatar" aria-hidden="true"><?= esc(substr($user['full_name'], 0, 1)) ?></span><strong><?= esc($user['full_name']) ?></strong></span></td>
                    <td data-label="Created"><time datetime="<?= esc($user['created_at']) ?>"><?= esc(date('M j, Y', strtotime($user['created_at']))) ?></time></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->endSection() ?>
