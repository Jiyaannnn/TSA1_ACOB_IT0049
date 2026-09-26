<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="page-heading"><span class="eyebrow">Refill bar / team profile</span><h1>Demo profile</h1><p>The single user record in the task system.</p></section>
<?php if ($user): ?>
<section class="about-grid profile-page"><article class="story-card"><span class="card-tag">SHOP TEAM</span><h2><?= esc($user['full_name']) ?></h2><p>This demo team member coordinates refill shop tasks. The profile reads from the task system’s users table.</p></article><aside class="profile-card"><div class="avatar" aria-hidden="true"><?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?></div><span class="eyebrow">Account details</span><dl><div><dt>Username</dt><dd>@<?= esc($user['username']) ?></dd></div><div><dt>Email</dt><dd><a href="mailto:<?= esc($user['email'], 'attr') ?>"><?= esc($user['email']) ?></a></dd></div><div><dt>Created</dt><dd><?= esc(date('F j, Y', strtotime($user['created_at']))) ?></dd></div></dl></aside></section>
<?php else: ?><p class="task-empty">No demo user found. Run the task seeder.</p><?php endif ?>
<?= $this->endSection() ?>
