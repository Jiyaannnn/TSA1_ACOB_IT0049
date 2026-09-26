<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="page-heading page-heading-row"><div><span class="eyebrow">Refill bar / task schedule</span><h1>All shop tasks</h1><p>Every refill shop task in date order, including past and upcoming work.</p></div><span class="record-count"><?= count($tasks) ?> tasks</span></section>
<section class="refill-task-list refill-task-list-page" aria-label="All tasks">
<?php if ($tasks === []): ?><p class="task-empty">No tasks yet. Run the included seeder to add sample records.</p><?php endif ?>
<?php foreach ($tasks as $task): ?>
<article class="refill-task"><span class="task-check status-<?= esc(str_replace(' ', '-', $task['status'])) ?>" aria-hidden="true"></span><div><h2><?= esc($task['title']) ?></h2><span><?= esc(date('l, M j, Y', strtotime($task['task_date']))) ?></span></div><strong class="task-status status-<?= esc(str_replace(' ', '-', $task['status'])) ?>"><?= esc(ucwords($task['status'])) ?></strong></article>
<?php endforeach ?>
</section>
<?= $this->endSection() ?>
