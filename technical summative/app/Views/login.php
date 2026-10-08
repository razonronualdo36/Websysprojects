<?= view('_start',['pageTitle'=>'Login']) ?>
<h1>Login</h1>
<?php if (session()->getFlashdata('error')): ?><p class="error"><?= esc(session()->getFlashdata('error')) ?></p><?php endif; ?>
<form method="post" action="<?= site_url('login') ?>"><?= csrf_field() ?>
<label for="username">Username</label><input id="username" name="username" value="<?= esc(old('username')) ?>" required autocomplete="username">
<label for="password">Password</label><input id="password" name="password" type="password" required autocomplete="current-password">
<p><button type="submit">Login</button></p></form>
<?= view('_end') ?>
