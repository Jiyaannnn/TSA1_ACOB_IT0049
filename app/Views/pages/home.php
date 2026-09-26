<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<!-- extend() reuses the shared layout; this section fills its main content area. -->

<section class="hero" aria-labelledby="dashboard-title">
    <div class="hero-copy-block">
        <span class="eyebrow"><i></i> Refill shop / daily work</span>
        <h1 id="dashboard-title">Every refill.<br><span>On the record.</span></h1>
        <p class="hero-copy">Ledgerline Refill keeps the shop team, customer directory, and today’s work in one place. Check the refill bar’s tasks before the doors open.</p>
        <div class="hero-actions">
            <a class="button button-primary" href="<?= site_url('customers') ?>">View customers <span aria-hidden="true">→</span></a>
            <a class="button button-secondary" href="<?= site_url('tasks') ?>">View all tasks</a>
        </div>
    </div>
    <aside class="terminal" aria-label="System summary">
        <div class="terminal-bar"><span><i></i><i></i><i></i></span><b>REFILL LEDGER</b><small>DB-01</small></div>
        <div class="terminal-display">
            <span class="scan-line" aria-hidden="true"></span>
            <div class="terminal-kicker">SHOP RECORDS</div>
            <div class="terminal-total"><strong><?= esc($customerCount + $userCount) ?></strong><span>directory<br>records</span></div>
            <div class="terminal-stats">
                <div><span>Customers</span><b><?= esc(str_pad((string) $customerCount, 2, '0', STR_PAD_LEFT)) ?></b></div>
                <div><span>Staff users</span><b><?= esc(str_pad((string) $userCount, 2, '0', STR_PAD_LEFT)) ?></b></div>
                <div><span>Today’s tasks</span><b><?= esc(str_pad((string) count($tasks), 2, '0', STR_PAD_LEFT)) ?></b></div>
            </div>
            <div class="terminal-status"><span><i></i> Database connection active</span><code>CI 4.7.4</code></div>
        </div>
        <span class="terminal-shadow" aria-hidden="true"></span>
    </aside>
</section>

<section class="refill-today" aria-labelledby="today-title">
    <div class="section-label"><span>Today / <?= esc(date('M j, Y', strtotime($today))) ?></span><h2 id="today-title">At the refill bar.</h2></div>
    <p class="refill-intro">Only work scheduled for today appears here.</p>
    <?php if ($tasks === []): ?>
        <p class="task-empty">No tasks are scheduled today. <a href="<?= site_url('tasks') ?>">See all tasks</a>.</p>
    <?php else: ?>
        <div class="refill-task-list">
        <?php foreach ($tasks as $task): ?>
            <article class="refill-task"><span class="task-check status-<?= esc(str_replace(' ', '-', $task['status'])) ?>" aria-hidden="true"></span><div><h3><?= esc($task['title']) ?></h3><span>Today · <?= esc(date('M j', strtotime($task['task_date']))) ?></span></div><strong class="task-status status-<?= esc(str_replace(' ', '-', $task['status'])) ?>"><?= esc(ucwords($task['status'])) ?></strong></article>
        <?php endforeach ?>
        </div>
    <?php endif ?>
    <a class="task-more" href="<?= site_url('tasks') ?>">See complete task schedule <span aria-hidden="true">→</span></a>
</section>

<section class="directory-section" aria-labelledby="directory-title">
    <div class="section-label"><span>Shop records / 03</span><h2 id="directory-title">Explore the shop records.</h2></div>
    <div class="feature-grid">
    <a class="feature-card" href="<?= site_url('customers') ?>">
        <span class="feature-icon" aria-hidden="true">C</span><span class="card-tag">CUSTOMERS / <?= esc(str_pad((string) $customerCount, 2, '0', STR_PAD_LEFT)) ?></span><h3>Customer accounts</h3>
        <p>The existing customer contacts for the refill shop.</p><span class="card-link">Open records <span aria-hidden="true">→</span></span>
    </a>
    <a class="feature-card" href="<?= site_url('users') ?>">
        <span class="feature-icon" aria-hidden="true">U</span><span class="card-tag">USERS / <?= esc(str_pad((string) $userCount, 2, '0', STR_PAD_LEFT)) ?></span><h3>User accounts</h3>
        <p>The existing staff accounts in the original Ledgerline database.</p><span class="card-link">Open accounts <span aria-hidden="true">→</span></span>
    </a>
    <a class="feature-card" href="<?= site_url('tasks') ?>">
        <span class="feature-icon" aria-hidden="true">A</span><span class="card-tag">TASKS / TSA1</span><h3>Daily tasks</h3>
        <p>The refill shop schedule, from dispenser checks to container returns.</p><span class="card-link">View tasks <span aria-hidden="true">→</span></span>
    </a>
    </div>
</section>

<?= $this->endSection() ?>
