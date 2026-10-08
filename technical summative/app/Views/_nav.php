<nav style="display:flex;gap:15px;flex-wrap:wrap;margin-bottom:22px">
<a href="<?= site_url('/') ?>">Home</a><a href="<?= site_url('welcome') ?>">Today's Tasks</a><a href="<?= site_url('tasks') ?>">All Tasks</a><a href="<?= site_url('profile') ?>">Profile</a><a href="<?= site_url('about') ?>">About</a>
<?php if (session()->get('isLoggedIn')): ?>
<span>Signed in: <?= esc(session()->get('username')) ?></span>
<form method="post" action="<?= site_url('logout') ?>" style="display:inline"><?= csrf_field() ?><button type="submit">Logout</button></form>
<?php else: ?><a href="<?= site_url('login') ?>">Login</a><?php endif; ?>
</nav>
