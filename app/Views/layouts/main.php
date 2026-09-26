<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ledgerline Refill neighborhood shop records and daily task schedule">
    <title><?= esc($title) ?> | Ledgerline Refill</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:opsz,wght@9..144,500;9..144,600&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="<?= base_url('favicon.svg') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
<a class="skip-link" href="#main-content">Skip to content</a>
<div class="site-shell">
    <div class="top-note"><span>LEDGERLINE REFILL</span><span>Neighborhood essentials, thoughtfully replenished.</span></div>
    <header class="site-header">
        <a class="brand" href="<?= site_url('/') ?>" aria-label="Ledgerline Refill home"><span class="brand-icon" aria-hidden="true">↻</span><span class="brand-name">ledgerline<span> / refill</span></span></a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">Menu <span aria-hidden="true">☰</span></button>
        <nav class="site-nav" id="site-navigation" aria-label="Main navigation">
            <a class="<?= $activePage === 'home' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Today</a>
            <a class="<?= $activePage === 'tasks' ? 'active' : '' ?>" href="<?= site_url('tasks') ?>">All tasks</a>
            <a class="<?= $activePage === 'customers' ? 'active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
            <a class="<?= $activePage === 'users' ? 'active' : '' ?>" href="<?= site_url('users') ?>">Staff</a>
            <a class="<?= $activePage === 'profile' ? 'active' : '' ?>" href="<?= site_url('profile') ?>">Profile</a>
            <a class="<?= $activePage === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
        </nav>
    </header>
    <main id="main-content" tabindex="-1"><?= $this->renderSection('content') ?></main>
    <footer class="site-footer"><div><strong>Bring back. Refill. Repeat.</strong><span>Ledgerline Refill is a student project for IT0049.</span></div><span>Made by Jian Edward A. Acob · TW32</span></footer>
</div>
<script>
// The menu button exposes the same page links on narrow screens.
const menuButton = document.querySelector('.nav-toggle');
const nav = document.querySelector('.site-nav');
menuButton?.addEventListener('click', () => {
    const open = menuButton.getAttribute('aria-expanded') === 'true';
    menuButton.setAttribute('aria-expanded', String(!open));
    nav.classList.toggle('open', !open);
});
</script>
</body>
</html>
