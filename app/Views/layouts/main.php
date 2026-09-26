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
    <script>
    // Apply the saved or system theme before the stylesheet paints the page.
    (() => {
        let saved;
        try { saved = localStorage.getItem('ledgerline-theme'); } catch (_) {}
        document.documentElement.dataset.theme = saved || (matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    })();
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
<a class="skip-link" href="#main-content">Skip to content</a>
<div class="site-shell">
    <div class="top-note"><span>LEDGERLINE REFILL</span><span>Neighborhood essentials, thoughtfully replenished.</span></div>
    <header class="site-header">
        <a class="brand" href="<?= site_url('/') ?>" aria-label="Ledgerline Refill home"><span class="brand-icon" aria-hidden="true">↻</span><span class="brand-name">ledgerline<span> / refill</span></span></a>
        <nav class="site-nav" id="site-navigation" aria-label="Main navigation">
            <a class="<?= $activePage === 'home' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Today</a>
            <a class="<?= $activePage === 'tasks' ? 'active' : '' ?>" href="<?= site_url('tasks') ?>">All tasks</a>
            <a class="<?= $activePage === 'customers' ? 'active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
            <a class="<?= $activePage === 'users' ? 'active' : '' ?>" href="<?= site_url('users') ?>">Staff</a>
            <a class="<?= $activePage === 'profile' ? 'active' : '' ?>" href="<?= site_url('profile') ?>">Profile</a>
            <a class="<?= $activePage === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
        </nav>
        <div class="header-controls">
            <button class="theme-toggle" type="button" aria-pressed="false" aria-label="Switch to dark mode">
                <svg class="theme-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32 1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/></svg>
                <svg class="theme-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M20.2 16.5A8.5 8.5 0 0 1 7.5 3.8 8.5 8.5 0 1 0 20.2 16.5Z"/></svg>
                <span class="theme-label">Dark mode</span>
            </button>
            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">Menu <span aria-hidden="true">☰</span></button>
        </div>
    </header>
    <main id="main-content" tabindex="-1"><?= $this->renderSection('content') ?></main>
    <footer class="site-footer"><div><strong>Bring back. Refill. Repeat.</strong><span>Ledgerline Refill is a student project for IT0049.</span></div><span>Made by Jian Edward A. Acob · TW32</span></footer>
</div>
<script>
// The menu button exposes the same page links on narrow screens.
const menuButton = document.querySelector('.nav-toggle');
const nav = document.querySelector('.site-nav');
const themeButton = document.querySelector('.theme-toggle');
const themeLabel = document.querySelector('.theme-label');
function updateThemeButton() {
    const dark = document.documentElement.dataset.theme === 'dark';
    themeButton.setAttribute('aria-pressed', String(dark));
    themeButton.setAttribute('aria-label', `Switch to ${dark ? 'light' : 'dark'} mode`);
    themeLabel.textContent = dark ? 'Light mode' : 'Dark mode';
}
updateThemeButton();
themeButton.addEventListener('click', () => {
    const next = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
    document.documentElement.dataset.theme = next;
    try { localStorage.setItem('ledgerline-theme', next); } catch (_) {}
    updateThemeButton();
});
menuButton?.addEventListener('click', () => {
    const open = menuButton.getAttribute('aria-expanded') === 'true';
    menuButton.setAttribute('aria-expanded', String(!open));
    nav.classList.toggle('open', !open);
});
</script>
</body>
</html>
