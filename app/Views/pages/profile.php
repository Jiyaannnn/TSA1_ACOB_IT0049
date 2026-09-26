<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="page-intro"><p class="eyebrow">Shop team</p><h1>Profile<span class="title-dot">.</span></h1><p>Meet the refill shop team member keeping daily operations on track.</p></section>
<?php if ($user): ?><section class="profile-card"><div class="avatar" aria-hidden="true"><?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?></div><div><p class="eyebrow">Refill team</p><h2><?= esc($user['full_name']) ?></h2><dl><div><dt>Username</dt><dd><?= esc($user['username']) ?></dd></div><div><dt>Email</dt><dd><a href="mailto:<?= esc($user['email'], 'attr') ?>"><?= esc($user['email']) ?></a></dd></div><div><dt>Joined</dt><dd><?= esc(date('F j, Y', strtotime($user['created_at']))) ?></dd></div></dl></div></section><?php else: ?><div class="empty-state"><h2>No profile found</h2><p>Run the included seeder to add the demo user.</p></div><?php endif ?>
<?= $this->endSection() ?>
