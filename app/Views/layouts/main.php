<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Ledgerline Refill shop daily operations">
<title><?= esc($title) ?> | Ledgerline Refill</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="icon" type="image/svg+xml" href="<?= base_url('favicon.svg') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head><body>
<a class="skip-link" href="#main-content">Skip to content</a>
<div class="app-shell">
<header class="site-header"><a class="brand" href="<?= site_url('/') ?>" aria-label="Ledgerline Refill home"><span class="brand-mark" aria-hidden="true">↻</span><span>ledgerline<span class="brand-light">/refill</span></span></a>
<nav aria-label="Main navigation"><a class="<?= $activePage === 'today' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Today</a><a class="<?= $activePage === 'tasks' ? 'active' : '' ?>" href="<?= site_url('tasks') ?>">All tasks</a><a class="<?= $activePage === 'profile' ? 'active' : '' ?>" href="<?= site_url('profile') ?>">Profile</a><a class="<?= $activePage === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a></nav></header>
<main id="main-content" tabindex="-1"><?= $this->renderSection('content') ?></main>
<footer class="site-footer"><span>Ledgerline Refill</span><span>IT0049 · TSA1 · Jian Edward A. Acob</span></footer>
</div></body></html>
